<?php
/* BACKEND Dashboard */
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('', 'DashboardController@index')->name('backend.dashboard.list');
    });
