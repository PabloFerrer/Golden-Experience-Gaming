<?php

Auth::routes();

Route::get('/', 'IndexController@index');

Route::get('/index', 'IndexController@index');
Route::get('/catalog', 'CatalogController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/game/{id}', 'GameController@index');

//Place routes for clients here
Route::group(['middleware' => 'client'], function(){
	Route::get('/wallet', 'WalletController@index')->name('wallet');
	Route::post('/wallet/edit', 'WalletController@update');
	
	Route::get('/cart', 'CartController@index')->name('cart');
	Route::post('/cart/buy', 'CartController@buy');
});

//Place routes for publishers here here
Route::group(['middleware' => 'publisher'], function(){


});

//Place routes for admins here here
Route::group(['middleware' => 'admin'], function(){


});
