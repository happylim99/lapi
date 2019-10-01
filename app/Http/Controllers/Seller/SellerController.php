<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Seller;

class SellerController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('scope:read-general')->only('show');
        $this->middleware('can:view,seller')->only('show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->allowedAdminAction();
        $sellers = Seller::has('products')->get();
        //return response()->json(['data' => $sellers], 200);
        return $this->showAll($sellers);
    }

    public function show(Seller $seller)
    {
        //$seller = Seller::has('products')->findOrFail($id);
        //return response()->json(['data' => $seller], 200);
        return $this->showOne($seller);
    }
}
