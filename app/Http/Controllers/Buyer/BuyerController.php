<?php

namespace App\Http\Controllers\Buyer;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Buyer;

class BuyerController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('scope:read-general')->only('show');
        $this->middleware('can:view,buyer')->only('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->allowedAdminAction();
        $buyers = Buyer::has('transactions')->get();
        //return response()->json(['data' => $buyers], 200);
        return $this->showAll($buyers);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Buyer $buyer)
    {
        //change to global scope
        //$buyer = Buyer::has('transactions')->findOrFail($id);
        
        //return response()->json(['data' => $buyer], 200);
        return $this->showOne($buyer);
    }
}
