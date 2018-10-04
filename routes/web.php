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


Route::prefix('customers')->group(function (){
    Route::get('home', function () {
        return view('welcome');
    })->name('home_list');
    Route::get('list', 'CustomerController@list')->name('customer_list');
    Route::get('{id}/delete', 'CustomerController@delete')->name('customer_delete');
    Route::get('add', 'CustomerController@create')->name('customer_add');
    Route::post('add','CustomerController@store')->name('add');
    Route::get('{id}/update', 'CustomerController@edit')->name('customer_update');
    Route::post('{id}/update', 'CustomerController@update')->name('update');
});