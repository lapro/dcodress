<?php

/* ----------------------         AUTH                -----------------------*/


Route::get('/', "HomeController@index");

Route::get('register', "Auth\AuthController@getRegister");
Route::post('register', "Auth\AuthController@postRegister");

Route::get('login', "Auth\AuthController@getLogin");
Route::post('login', "Auth\AuthController@postLogin");

Route::get('logout', "Auth\AuthController@getLogout");


/* ----------------------         POSTING                -----------------------*/

Route::post("post/upload", "Member\PostsController@postUpload");
Route::get("post/{kode}", ["middleware"=>"auth","uses"=>"Member\PostsController@getIndex"]);
Route::post("post/{kode}", "Member\PostsController@postIndex");


/* ----------------------         KATALOG                -----------------------*/

Route::get('katalog/', "Member\KatalogController@katalogAll");
Route::get('katalog/{username}', "Member\KatalogController@getKatalogUser");
Route::get('detail/{kode}',"Member\DetailController@getIndex");


/* ----------------------         BACKOFFICE                -----------------------*/

Route::group(["prefix"=>"backoffice", "middleware"=>"auth"],function(){

	Route::get("/","BackOffice\DashboardController@index");

	Route::controller("users", "BackOffice\UsersController");

	//products
	Route::get('products/datatables',['uses'=>'Backoffice\ProductsController@datatables']);
	Route::resource('products',"Backoffice\ProductsController");

});


/* ----------------------         BUTIK                -----------------------*/

Route::group(["prefix"=>"butik", "middleware"=>"auth"],function(){

	Route::get("/","Butik\HomeController@index");
	
	//untuk display atau lihat produk
	Route::get("/{slug}", "Butik\DisplayController@index");

});

/*

Route::group(['prefix'=>"adm", "namespace"=>'Adm','middleware'=>'auth'], function(){

	Route::get("/", 'HomeController@index');
	Route::get(
	'products/datatables',
	['uses'=>'ProductsController@datatables']);


	Route::resource('products',"ProductsController");

	Route::get('products/images/{id}', "ProductsController@images");
	Route::post('products/images/{id}', "ProductsController@uploadImages");
	Route::delete('products/images/{id}', "ProductsController@deleteImages");

	Route::controller("invoices", "InvoiceController");
});

Route::group(['middleware'=>'auth'], function(){

	Route::get('home','Member\HomeController@index');
});


Route::controller('/auth','Auth\AuthController');

Route::get('/share/{slug}', ['uses'=>"ShareController@index"]);
Route::post('/share/sharingDiscount/{slug}/{provider}', ['uses'=>"ShareController@sharingDiscount"]);

Route::controller("/cart", "CartController");
Route::controller("/checkout", "CheckoutController");
Route::controller("/ongkir", "OngkirController");

Route::get('/{slug}', ["uses"=>"DisplayController@index"]);
*/

