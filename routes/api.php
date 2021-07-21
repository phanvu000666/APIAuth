<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('product', 'Product\ProductController@product');
// Route::get('product/{id}', 'Product\ProductController@productByID');
// Route::get('product', 'Product\ProductController@productSave');
//API ROUTE REGISTER
Route::post('register','APIUser\UserApiController@register');
// Route::get('/dangki','OveAuth\ApiUserController@create')->name('dangki');


//API ROUTE LOGIN
Route::post('login','APIUser\UserApiController@login');
// Route::get('/dangnhap','OveAuth\ApiUserController@create')->name('api/dangnhap');
