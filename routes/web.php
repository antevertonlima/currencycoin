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
    Route::prefix('criptocoins')->group(function () {
        Route::resource('algo', 'Manager\AlgorithmController', ['except' => ['show','destroy']]);
        Route::get('algo/{algo}', 'Manager\AlgorithmController@destroy')->name('algo.destroy');
    
        Route::resource('coin', 'Manager\CoinController', ['except' => ['show','destroy']]);
        Route::get('coin/{coin}', 'Manager\CoinController@destroy')->name('coin.destroy');    
    });

    Route::prefix('graphics_cards')->group(function () {
        Route::resource('brand', 'Manager\BrandController', ['except' => ['show','destroy']]);
        Route::get('brand/{brand}', 'Manager\BrandController@destroy')->name('brand.destroy');

        Route::resource('gtype', 'Manager\GraphicTypeController', ['except' => ['show','destroy']]);
        Route::get('gtype/{gtype}', 'Manager\GraphicTypeController@destroy')->name('gtype.destroy');

        Route::resource('gserie', 'Manager\GraphicSerieController', ['except' => ['show','destroy']]);
        Route::get('gserie/{gserie}', 'Manager\GraphicSerieController@destroy')->name('gserie.destroy');

        Route::resource('gcard', 'Manager\GraphicsCardController', ['except' => ['show','destroy']]);
        Route::get('gcard/{gcard}', 'Manager\GraphicsCardController@destroy')->name('gcard.destroy');

        Route::resource('ghash', 'Manager\GraphicsHashController', ['except' => ['show','destroy']]);
        Route::get('ghash/{ghash}', 'Manager\GraphicsHashController@destroy')->name('ghash.destroy');
    });

    Route::prefix('rigs')->group(function () {
        Route::resource('mgroup', 'Manager\MiningGroupsController', ['except' => ['show','destroy']]);
        Route::get('mgroup/{mgroup}', 'Manager\MiningGroupsController@destroy')->name('mgroup.destroy');

        Route::resource('grig', 'Manager\RigsController', ['except' => ['show','destroy']]);
        Route::get('grig/{grig}', 'Manager\RigsController@destroy')->name('grig.destroy');
    });
    
});
