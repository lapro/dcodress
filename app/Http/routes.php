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

Route::group(['prefix'=>"adm", "namespace"=>'adm'], function(){

	Route::get("/", 'Home@index');

	Route::resource('products',"Adm/ProductsController");
});
	