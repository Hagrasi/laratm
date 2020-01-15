<?php 

/*----------------------------------------------------------
Groups
----------------------------------------------------------*/

// Route::resource('/admins','AdminController');
Route::get('/','AdminController@index');
Route::get('createClient', 'AdminController@createClient');
Route::post('storeClient', 'AdminController@storeClient');

// Route::group(['prefix' => '/admins'] , function () {
//     Route::get('/', 'AdminController@index');
//     Route::get('edit/{id}', 'AdminController@edit');
//     Route::post('update/{id}', 'AdminController@update');
//     Route::get('add', 'AdminController@add');
//     Route::post('create', 'AdminController@create');
//     Route::get('delete/{id}', 'AdminController@delete');
// });