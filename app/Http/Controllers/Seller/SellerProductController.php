<?php

namespace App\Http\Controllers\Seller;

use App\User;
use App\Models\Seller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SellerProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $products = $seller->products;
        return $this->showAll($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $seller)
    {
        //dd(public_path('img2'));
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|integer|min:1',
            'image' => 'required|image'
        ];

        $data = $this->validate($request, $rules);

        $data['status'] = Product::UNAVAILABLE_PRODUCT;
        $data['image'] = $request->image->store('img3');
        $data['seller_id'] = $seller->id;

        $product = Product::create($data);

        return $this->showOne($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller, Product $product)
    {
        $rules = [
            'quantity' => 'integer|min:1',
            'status' => 'in:' . Product::AVAILABLE_PRODUCT . ',' . Product::UNAVAILABLE_PRODUCT,
            'image' => 'image'
        ];
        $data = $this->validate($request,$rules);
        
        $this->checkSeller($seller, $product);

        $product->fill($request->only([
            'name',
            'description',
            'quantity'
        ]));

        if($request->has('status')) {
            $product->status = $request->status;

            if($product->isAvailable() && $product->categories()->count() === 0) {
                return $this->errorResponse('An Active product must have at least one category', 409);
            }
        }

        if($request->hasFile('image')) {
            Storage::delete($product->image);

            $product->image = $request->image->store('img3');
        }
        
        if($product->isClean()) {
            return $this->errorResponse('Please specify something to change', 422);
        }

        $product->save();
        return $this->showOne($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller, Product $product)
    {
        $this->checkSeller($seller, $product);

        $product->delete();
        Storage::delete($product->image);

        return $this->showOne($product);
    }

    protected function checkSeller($seller, $product)
    {
        if($seller->id != $product->seller_id) {
            throw new HttpException(422, 'Not the seller of the product');
        }
    }
}
