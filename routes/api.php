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

/**
 * Buyers
 */
Route::resource('buyers', 'Buyer\BuyerController', ['only' => ['index', 'show']]);

/**
 * Categorie
 */
Route::resource('categories', 'Category\CategoryController', ['except' => ['create', 'edit']]);

/**
 * Products
 */
Route::resource('products', 'Product\ProductController', ['only' => ['index', 'show']]);

/**
 * Sellers
 */
Route::resource('sellers', 'Seller\SellerController', ['only' => ['index', 'show']]);

/**
 * Transactions
 */
Route::resource('Transactions', 'Transaction\TransactionController', ['only' => ['index', 'show']]);

/**
 * Users
 */
Route::resource('Users', 'User\UserController', ['except' => ['create', 'edit']]);