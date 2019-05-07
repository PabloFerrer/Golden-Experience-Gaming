<?php

use App\Game;
use Illuminate\Support\Facades\Input;

Auth::routes();

Route::get('/', 'IndexController@index');

Route::get('/index', 'IndexController@index');
Route::get('/catalog', 'CatalogController@index');
//Route::get('/search/{name}', 'SearchController@search')->name('search');
Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $game = Game::where('name','LIKE','%'.$q.'%')->get();
    if(count($game) > 0)
        return view('search')->withDetails($game)->withQuery ( $q );
    else return view ('game')->withMessage('No Details found. Try to search again !');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/game/{id}', 'GameController@index');

//Place routes for clients here
Route::group(['middleware' => 'client'], function(){
	Route::get('/wallet', 'WalletController@index')->name('wallet');
	Route::post('/wallet/edit', 'WalletController@update');

  Route::get('/library', 'UserController@getLibrary')->name('library');;

	Route::get('/cart', 'CartController@index')->name('cart');
	Route::post('/cart/buy', 'CartController@buy');
	Route::post('/cart/remove', 'CartController@remove');

	Route::post('/game/{id}/add','GameController@add');
	Route::post('/game/{id}/wish','GameController@wish');
	Route::post('/game/{id}/review', 'OpinionController@review');

	Route::get('/wishlist', 'WishlistController@index')->name('wishlist');
	Route::post('/wishlist/{id}/add', 'WishlistController@add');
	Route::post('/wishlist/remove', 'WishlistController@remove');
});

//Place routes for publishers here here
Route::group(['middleware' => 'publisher'], function(){
	Route::get('/royalties', 'WalletController@royalties')->name('royalties');
	Route::post('/royalties/retrieve', 'WalletController@retrieve');
	Route::get('/salesreports', 'SalesController@index');
	Route::get('/gameseller/{id_publisher}', 'GameSellerController@index');

	Route::get('/editgame', 'GameSellerController@showeditgame');
	Route::get('/editgametext', 'GameSellerController@editgamemenu');
	Route::post('/editgametext/finished', 'GameSellerController@editgame');

	Route::get('/creategame', 'GameSellerController@showcreategame');
	Route::post('/creategame/finished', 'GameSellerController@creategame');

});

//Place routes for admins here here
Route::group(['middleware' => 'admin'], function(){


});
