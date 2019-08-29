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
Route::apiResource('buyers.transactions', 'Buyer\BuyerTransactionController', ['only' => ['index']]);

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
Route::apiResource('transactions.categories', 'Transaction\TransactionCategoryController', ['only' => ['index']]);
Route::apiResource('transactions.sellers', 'Transaction\TransactionSellerController', ['only' => ['index']]);

/**
 * Users
 */
Route::apiResource('users', 'User\UserController', ['except' => ['create', 'edit']]);

/**
 * Working day master
 */
Route::apiResource('working_day_masters', 'WorkingDayMaster\WorkingDayMasterController', ['except' => ['create', 'edit']]);

Route::apiResource('working_day_details', 'WorkingDayDetail\WorkingDayDetailController', ['except' => ['create', 'edit']]);

Route::apiResource('working_day_by_year', 'WorkingDay\WorkingDayByYearController', ['except' => ['create', 'edit']]);
