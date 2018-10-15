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

Route::get('home', function () {
    return view('welcome');
})->name('home_list');

Route::prefix('customers')->group(function () {

    Route::get('/', 'CustomerController@list')->name('customer_list');

    Route::get('{id}/delete', 'CustomerController@delete')->name('customer_delete');

    Route::get('add', 'CustomerController@create')->name('customer_add');
    Route::post('add', 'CustomerController@store')->name('add');

    Route::get('{id}/update', 'CustomerController@edit')->name('customer_update');
    Route::post('{id}/update', 'CustomerController@update')->name('update');

    Route::get('filter', 'CustomerController@filterByCity')->name('customer_filterByCity');

    Route::get('search', 'CustomerController@search')->name('customer_search');
});

Route::prefix('cities')->group(function () {

    Route::get('list', 'CityController@list')->name('cities_list');

    Route::get('{id}/delete', 'CityController@delete')->name('cities_delete');

    Route::get('addCity', 'CityController@create')->name('cities_addCity');
    Route::post('addCity', 'CityController@store')->name('addCity');

    Route::get('{id}/update', 'CityController@edit')->name('cities_update');
    Route::post('{id}/update', 'CityController@update')->name('updateCity');
});