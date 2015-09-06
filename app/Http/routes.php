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

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix'=>"adm", "namespace"=>'Adm'], function(){

	Route::get("/", 'HomeController@index');

	Route::get(
	'products/datatables',
	['uses'=>'ProductsController@datatables']);
	Route::resource('products',"ProductsController");
});
	