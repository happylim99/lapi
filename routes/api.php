<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

/**
 * Buyers
 */
Route::apiResource('buyers', 'Buyer\BuyerController', ['only' => ['index', 'show']]);

/**
 * Categories
 */
Route::apiResource('categories', 'Category\CategoryController', ['except' => ['create', 'edit']]);

/**
 * Products
 */
Route::apiResource('products', 'Product\ProductController', ['only' => ['index', 'show']]);

/**
 * Sellers
 */
Route::apiResource('sellers', 'Seller\SellerController', ['only' => ['index', 'show']]);

/**
 * Transaction
 */
Route::apiResource('transactions', 'Transaction\TransactionController', ['only' => ['index', 'show']]);

/**
 * Users
 */
Route::apiResource('users', 'User\UserController', ['except' => ['create', 'edit']]);
