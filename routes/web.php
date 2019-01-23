<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('/post', "DownloadController@post");


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
