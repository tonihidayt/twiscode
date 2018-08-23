<?php
/* BACKEND Dashboard */
Route::group(['namespace' => 'Auth'], function () {
	Route::get('login', 'AuthController@showLoginForm')->name('backend.login.list');
	Route::post('login', 'AuthController@login')->name('backend.login.post');
    Route::get('logout', 'AuthController@logout')->name('backend.logout');
      
	});