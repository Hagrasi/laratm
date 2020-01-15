<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('/cards','CardController');
Route::resource('/clients','ClientController');
Route::resource('/transactions','TransactionController');

Route::get('/','MainController@loginView');

Route::get('/login', 'MainController@loginView');
Route::post('/login', 'MainController@login');

Route::get('/home', 'MainController@homeView');

Route::get('/withdraw','MainController@withdrawView');
Route::post('/withdraw','MainController@withdraw');

Route::get('/trans', 'MainController@transactionView');

Route::post('/trans/getCardBalance','TransactionController@getCardBalance');


Route::get('/sort', 'MainController@sort');
Route::get('/logout', 'MainController@logout');

