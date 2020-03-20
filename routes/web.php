<?php

use Illuminate\Support\Facades\Route;

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

/**Corona Global Routes */

Route::group(['prefix' => 'coronas_global'], function () {
    Route::get('/', 'CoronaGlobalController@index')->name('coronas.global.index');
    Route::get('/create', 'CoronaGlobalController@create')->name('coronas.global.create');
    Route::post('/store', 'CoronaGlobalController@store')->name('coronas.global.store');
    Route::patch('/edit', 'CoronaGlobalController@edit')->name('coronas.global.edit');
    Route::delete('/destroy', 'CoronaGlobalController@destroy')->name('coronas.global.destroy');
});

// Route::resource('coronas_global', 'CoronaGlobalController');
// Route::resource('coronas_local', 'CoronaLocalController');
