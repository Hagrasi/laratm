<?php 

/*----------------------------------------------------------
Groups
----------------------------------------------------------*/
Route::group(['prefix' => '/admins'] , function () {
    Route::get('/', 'AdminController@index');
    Route::get('edit/{id}', 'AdminController@edit');
    Route::post('update/{id}', 'AdminController@update');
    Route::get('add', 'AdminController@add');
    Route::post('create', 'AdminController@create');
    Route::get('delete/{id}', 'AdminController@delete');
});