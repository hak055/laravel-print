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


Route::resource('tovar', 'TovarController')->except([
    	'index'
]);

Route::get('/', 'TovarController@index');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::resource('mark', 'MarkController');
    Route::resource('phoneModel', 'PhoneModelController');
    Route::resource('print', 'PrintController');
    Route::resource('collection', 'CollectionController');
});




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
