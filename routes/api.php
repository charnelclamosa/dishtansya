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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// My API

// Users
Route::post('register', 'UserController@create')->name('register');

// Authentication
Route::post('login', 'AuthController@login')->name('login')->middleware('throttle:5,5');

// Products
Route::middleware('auth:sanctum')->group(function() {
    Route::get('products', 'ProductController@index')->name('products');
    Route::post('order', 'ProductController@order')->name('order');
});
