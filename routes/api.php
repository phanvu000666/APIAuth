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

// //Api Register
// Route::post('register','APIUser\UserApiController@register');
// //Api Login
// Route::post('login','APIUser\UserApiController@login');
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'APIUser\UserApiController@login');
    Route::post('signup', 'APIUser\UserApiController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'APIUser\UserApiController@logout');
        Route::get('user', 'APIUser\UserApiController@user');
        //Api Product
    //Lấy bảng Product
    Route::get('product', 'Product\ProductController@product');
    //Lấy Product dựa vào ID
    Route::get('product/{id}', 'Product\ProductController@productByID');
    //Thêm Product
    Route::post('product', 'Product\ProductController@productSave');
    //Sửa Product
    Route::put('product/{product}', 'Product\ProductController@productUpdate');
    //Xoá Product
    Route::delete('product/{product}', 'Product\ProductController@productDelete');
    });
});

