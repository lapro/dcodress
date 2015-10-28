<?php

/* ----------------------         AUTH                -----------------------*/
Route::get("tes","Butik\ShareController@tesFireBase");

Route::get('/', "HomeController@index");

Route::get('/ajax/{grid}', "HomeController@grid");

Route::get('register', "Auth\AuthController@getRegister");

Route::post('register', "Auth\AuthController@postRegister");

Route::get('login', "Auth\AuthController@getLogin");

Route::post('login', "Auth\AuthController@postLogin");

Route::controller('c','StatisController');

// SOCIAL LOGI [LOGIN dengan FACEBOOK atau GOOGLE Account]

Route::get('login/{provider}','Auth\AuthController@getSocialLogin');

//logout

Route::get('logout', "Auth\AuthController@getLogout");


Route::group(["middleware"=>"auth"],function(){
/* ----------------------         POSTING                -----------------------*/
//Route::get("submit", "Member\PostsController@getSubmit");

//Route::post("post/upload", "Member\PostsController@postUpload");

Route::get("post", ["uses"=>"Member\PostsController@getIndex"]);

Route::post("post", "Member\PostsController@postIndex");

Route::get('detail/{slug}',"Member\PostsController@detail");

Route::get('loving/{id}',"Member\PostsController@love");


/* ----------------------         KATALOG                -----------------------*/

Route::get('katalog/', "Member\KatalogController@katalogAll");

Route::get('katalog/{username}', "Member\KatalogController@getKatalogUser");




/* ----------------------         USER SETTING                -----------------------*/

Route::controller('settings', "Member\SettingController");

});//end member group function



/* ----------------------         DESAINER                -----------------------*/

Route::controller('sell', "Desainer\SellController");




/* ----------------------         BACKOFFICE                -----------------------*/

Route::group(["prefix"=>"backoffice", "middleware"=>"auth"],function(){

	Route::get("/","BackOffice\DashboardController@index");

	Route::controller("users", "BackOffice\UsersController");

	//products
	Route::get('products/datatables',['uses'=>'BackOffice\ProductsController@datatables']);

	Route::resource('products',"BackOffice\ProductsController");

	//invoices

	Route::controller('invoices',"BackOffice\InvoicesController");

	//pengajuan
	Route::get('pengajuan/datatables',['uses'=>'BackOffice\PengajuanProductController@datatables']);

	Route::resource('pengajuan',"BackOffice\PengajuanProductController");

});


/* ----------------------         BUTIK                -----------------------*/

Route::group(["prefix"=>"butik"], function(){

	Route::get("/","Butik\HomeController@index");
	
	//untuk display atau lihat produk
	
	Route::controller("/cart", "Butik\CartController");
	
	Route::controller("/checkout", "Butik\CheckoutController");


	Route::get('/random',"Butik\DisplayController@random");

	Route::get("/{slug}", "Butik\DisplayController@index");

	Route::get("/payment/konfirmasi", "Butik\PaymentController@getKonfirmasi");

	Route::post("/payment/konfirmasi", "Butik\PaymentController@postKonfirmasi");

	Route::get("/payment/{invoice}", "Butik\PaymentController@index");

	Route::get('/share/{slug}', ['uses'=>"Butik\ShareController@index"]);
	
	Route::post('/share/{slug}/{provider}', ['uses'=>"Butik\ShareController@sharingDiscount"]);


});


Route::get("cek-pesanan","StatusPesananController@index");


Route::controller("ongkir","OngkirController");

/* --------------------------- AJAx CALL ----------------------------------------*/

Route::get("category","Backoffice\CategoryController@all");

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

