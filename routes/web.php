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
    Route::get('/{id}/edit', 'CoronaGlobalController@edit')->name('coronas.global.edit');
    Route::post('/store', 'CoronaGlobalController@store')->name('coronas.global.store');
    Route::patch('/{id}', 'CoronaGlobalController@update')->name('coronas.global.update');
    Route::delete('/{id}', 'CoronaGlobalController@destroy')->name('coronas.global.destroy');
});
