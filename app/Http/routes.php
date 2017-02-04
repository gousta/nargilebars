<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'MainController@index')->name('index');
Route::get('/discover', 'MainController@discover')->name('discover');
Route::get('/{key}', 'MainController@storeview')->name('store.view');


Route::group([
    'namespace' => 'Api',
    'prefix' => 'api/',
    'as' => 'api.',
], function () {
    Route::get('store', 'StoreController@index')->name('store.index');
    Route::get('bar', 'BarController@index')->name('bar.index');
});
