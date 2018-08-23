<?php
/**
 * Frontend Client
 */
Route::group(['namespace' => 'Frontend'], function () {
   

});

/**
 * Backend Admin
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin'], function () {
    /**
     * Eloquent Sortable
     */
    Route::post('sort', '\Rutorika\Sortable\SortableController@sort')->name('backend.sort');
    require (__DIR__ . '/Backend/Products.php');
    require (__DIR__ . '/Backend/Dashboard.php');
    require (__DIR__ . '/Backend/Admins.php');
    require (__DIR__ . '/Backend/Login.php');
   });

/**
 * Blank pages for Ajax
 */
Route::get('blank', ['as' => 'blank', function () {
    return '';
}]);

//Vue
/*Route::get('/{vue_capture?}', function () {
return view('frontend.layouts.app');
})->where('vue_capture', '[\/\w\.-]*');*/
