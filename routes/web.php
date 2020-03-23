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
    Route::get('/create/global', 'CoronaGlobalController@create')->name('coronas.global.create.global');
    Route::get('/{id}/edit', 'CoronaGlobalController@edit')->name('coronas.global.edit');
    Route::post('/store_global', 'CoronaGlobalController@store')->name('coronas.global.store.global');
    Route::patch('/{id}', 'CoronaGlobalController@update')->name('coronas.global.update');
    Route::delete('/{id}', 'CoronaGlobalController@destroy')->name('coronas.global.destroy');
});

/**Corona Local Routes */
Route::group(['prefix' => 'coronas_local'], function () {
    Route::get('/{id}', 'CoronaLocalController@show')->name('coronas.local.show');
    Route::get('/{parent_id}/create/local', 'CoronaLocalController@create')->name('coronas.local.create.local');
    Route::get('/{id}/edit', 'CoronaLocalController@edit')->name('coronas.local.edit');
    Route::post('/store/local', 'CoronaLocalController@store')->name('coronas.local.store.local');
    Route::patch('/{id}', 'CoronaLocalController@update')->name('coronas.local.update');
    Route::delete('/{id}', 'CoronaLocalController@destroy')->name('coronas.local.destroy');
});
