<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index']);
Route::get('category', [FrontendController::class, 'category']);
Route::get('product', [FrontendController::class, 'product']);
Route::get('category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview']);


Auth::routes();

// Route::get('load-cart-data', [CartController::class, 'cartcount']);

Route::get('/home', [FrontendController::class, 'index']);

Route::post('add-to-cart',[CartController::class, 'addProduct']);
Route::post('delete-cart-item',[CartController::class, 'deleteproduct']);
Route::post('update-cart',[CartController::class, 'updatecart']);


Route::middleware(['auth'])->group(function() {
    Route::get('cart', [CartController::class, 'viewcart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    
    Route::post('place-order', [CheckoutController::class, 'placeorder']);

    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('my-dashboard', [UserController::class, 'dashboard']);
    Route::get('view-order/{id}', [UserController::class, 'view']);

    Route::get('invoice-order/{id}', [UserController::class, 'invoice']);
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', 'Admin\FrontendController@index');

    Route::get('categories', 'Admin\CategoryController@index');

    Route::get('categories/add-category', 'Admin\CategoryController@add');
    Route::get('categories/edit-category/{id}', [CategoryController::class, 'edit']);
    

    Route::post('insert-category', 'Admin\CategoryController@insert');
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('categories/delete-category/{id}', [CategoryController::class, 'destroy']);

    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/add-products', [ProductController::class, 'add']);

    Route::post('insert-product', [ProductController::class, 'insert']);

    Route::get('products/edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('products/delete-product/{id}', [ProductController::class, 'destroy']);

    Route::get('users', [FrontendController::class, 'users']);

    Route::get('orders', [OrderController::class, 'index']);
    Route::get('orders/view-order/{id}', [OrderController::class, 'view']);
    Route::put('update-order/{id}', [OrderController::class, 'updateorder']);

    Route::get('orders/order-history', [OrderController::class, 'orderhistory']);
    Route::get('orders/view-orderhistory/{id}', [OrderController::class, 'vieworderhistory']);

});