<?php

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/index', 'IndexController@index');
Route::get('/home', 'HomeController@index')->name('home');
