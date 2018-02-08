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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/currency/{coin}', 'SomeController@index');
Route::get('/calculator/{coin}/{hashrate}', 'BaseController@calculator')->name('api_calculator');
Route::get('/payments/{coin}/{wallet}', 'BaseController@payments')->name('api_payments');
Route::get('/general/{coin}/{wallet}', 'BaseController@general')->name('api_general');
