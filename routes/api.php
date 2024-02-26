<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\Frontend\AllproductController;
use App\Http\Controllers\OrderController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

/* Route::middleware('auth:api')->get('/user', function () {
    return User::get();
}); */

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/test', function () {
        return "hi";
    });
});
Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::get('/logout', 'logout');
});
Route::get('/frontend/home', 'FrontendController@index');
Route::get('/category/product/{id}', 'FrontendController@Category');
Route::get('product/details/{prod_id}', [AllproductController::class, 'product_detail'])->name('product.details');

// all product-list and type product
Route::get('/frontend/product-type/{type}', [AllproductController::class,'product_show']);
Route::get('/product/category/search/{id}',[AllproductController::class,'category_product_search']);
Route::get('/product/brand/search/{id}',[AllproductController::class,'brand_product_search']);
//add to cart
Route::get('/add-to-cart/{cart_id}', [CartController::class, 'cartAdd']);
Route::get('/cart/value/{id}', [CartController::class, 'getCartValue']);
Route::get('/product/cart/update/{id}', [CartController::class, 'cart_product_update']);
Route::get('/product/cart/decriment/{id}', [CartController::class, 'cart_product_decrement']);
//cart product remove
Route::get('/product/cart/remove/{id}',[CartController::class,'cart_product_remove']);

// order place

Route::post('/order-place',[OrderController::class,'proccessTo_check']);
Route::get('/frontend-dashboard/{id}',[OrderController::class,'myDashboard']);
Route::get('/frontend-all-orders/{id}',[OrderController::class,'allOrders']);
Route::get('/frontend-order-details/{id}',[OrderController::class,'my_order_details']);


Route::get('/get-division',[DivisionController::class,'division']);
Route::get('/get-districts/{id}',[DivisionController::class,'districts']);
Route::get('/get-upazila/{id}',[DivisionController::class,'upazila']);

//user info
Route::get('/get-user-info/{id}',[UserController::class,'userInfo']);
