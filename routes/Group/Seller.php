<?php

Route::group(['middleware'=>'seller.auth'], function (){

    Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);


});

