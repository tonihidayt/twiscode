<?php
/**
 * Products Routes
 */
Route::group(['prefix' => 'products'], function () {
    Route::get('', 'ProductsController@index')->name('backend.products.list');
    Route::get('create', 'ProductsController@create')->name('backend.products.create');
    Route::post('create', 'ProductsController@store')->name('backend.products.store');
    Route::get('edit/{id}', 'ProductsController@edit')->name('backend.products.edit');
    Route::post('edit/{id}', 'ProductsController@update')->name('backend.products.update');
    Route::get('delete/{id}', 'ProductsController@delete')->name('backend.products.delete');
    Route::get('print', 'ProductsController@prints')->name('backend.products.print');

});
?>
