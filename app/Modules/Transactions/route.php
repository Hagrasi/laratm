<?php 

Route::group(['middleware'=>'admin:webadmin' , 'prefix' => 'backend'], function () {
    Route::group(['prefix'=>'/question'], function () {
       	Route::get('/', 'QuestionBackendController@index');
            
    });
});

?>