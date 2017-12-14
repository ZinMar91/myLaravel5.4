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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('users', 'UserController@index')->name('users');
Route::get('users.data', 'UserController@getUsers')->name('users.data');*/

Route::resource('users', 'Datatable\UsersController');
