<?php

Auth::routes();

Route::get('/', 'IndexController@index');

Route::get('/index', 'IndexController@index');
Route::get('/home', 'HomeController@index')->name('home');
