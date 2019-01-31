<?php
Auth::routes();

Route::get('/', 'AdminController@index')->middleware('auth');
Route::get('/admin', 'AdminController@index')->middleware('auth');
Route::get('/admin/news', 'AdminController@newsCatalog');
Route::get('/admin/news/{id}', 'AdminController@viewNews');
Route::get('/admin/addNews', 'AdminController@addNews');
Route::get('/admin/addNews/{id}', 'AdminController@editNews');


Route::post('/saveNews', 'NewsController@saveNews');
Route::get('admin/deleteNews/{id}', 'NewsController@deleteNews');
Route::get('admin/activateNews/{id}', 'NewsController@activateNews');
Route::get('admin/deactivateNews/{id}', 'NewsController@deactivateNews');
