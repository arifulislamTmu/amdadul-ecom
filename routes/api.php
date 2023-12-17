<?php

use App\Http\Controllers\Api\AuthController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::controller(AuthController::class)->group(function(){
    Route::post('/login','login');
    Route::post('/register','register');
    Route::get('/logout','logout');
});
Route::get('/frontend/home', 'FrontendController@index');
/* Route::post('/login', [AuthController::class,"login"]);
Route::get('/logout', [AuthController::class,"logout"]); */
