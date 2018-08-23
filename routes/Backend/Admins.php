<?php
/* BACKEND Admin */
Route::group(['prefix' => 'admin'], function () {
    Route::get('','AdminsController@index')->name('backend.admins.list');
    Route::get('create', 'AdminsController@create')->name('backend.admins.create');
    Route::post('create', 'AdminsController@store')->name('backend.admins.store');
    Route::get('edit/{id}', 'AdminsController@edit')->name('backend.admins.edit');
    Route::post('edit/{id}', 'AdminsController@update')->name('backend.admins.update');
    Route::get('delete/{id}', 'AdminsController@delete')->name('backend.admins.delete');
});
?>