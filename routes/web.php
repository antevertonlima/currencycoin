<?php

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pool', 'SomeController@index')->name('pool');

// rotas de gerenciamento (backend)
Route::prefix('manager')->group(function () {    
    Route::resource('algo', 'Manager\AlgorithmController', ['except' => ['show','destroy']]);
    Route::get('algo/{algo}', 'Manager\AlgorithmController@destroy')->name('algo.destroy');

    Route::resource('coin', 'Manager\CoinController', ['except' => ['show','destroy']]);
    Route::get('coin/{coin}', 'Manager\CoinController@destroy')->name('coin.destroy');
    
    Route::resource('brand', 'Manager\BrandController', ['except' => ['show','destroy']]);
    Route::get('brand/{brand}', 'Manager\BrandController@destroy')->name('brand.destroy');
});
