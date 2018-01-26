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


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

/*Route::get('users', 'UserController@index')->name('users');
Route::get('users.data', 'UserController@getUsers')->name('users.data');*/

//Route::resource('users', 'Datatable\UsersController');

Route::get('user', 'ImportController@index');
Route::post('user/import', 'ImportController@import');
Route::get('user/export', 'ImportController@export');

/************ Image ************/
Route::get('resizeImage', 'ImageInterventionController@index');
Route::post('resizeImage', 'ImageInterventionController@resizeImage')->name('resizeImage');

