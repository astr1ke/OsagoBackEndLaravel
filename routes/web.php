<?php

Route::get('/', 'AdminController@index')->middleware('auth');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index')->middleware('auth');
    Route::get('/news', 'AdminController@newsCatalog');
    Route::get('/news/{id}', 'AdminController@viewNews');
    Route::get('/zayavki/{id}', 'AdminController@viewZayavka');
    Route::get('/addNews', 'AdminController@addNews');
    Route::get('/addNews/{id}', 'AdminController@editNews');

    Route::get('/zayavki', 'AdminController@zayavkiCatalog');
    Route::get('/deleteZayavka/{id}', 'ZayavkaController@deleteZayavka');

    Route::post('/saveNews', 'NewsController@saveNews');
    Route::get('/deleteNews/{id}', 'NewsController@deleteNews');
    Route::get('/activateNews/{id}', 'NewsController@activateNews');
    Route::get('/deactivateNews/{id}', 'NewsController@deactivateNews');
});


Auth::routes();
Route::get('logout', function (){
    auth::logout();
    return redirect('/');
});
