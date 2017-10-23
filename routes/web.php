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

Auth::routes();

Route::get('/home', 'ImoveisController@index')->name('home');
Route::get('/edit/{id}', 'ImoveisController@edit')->name('edit');
Route::get('/add', 'ImoveisController@add')->name('add');

Route::post('/insert', 'ImoveisController@insert')->name('insert');
Route::post('/update', 'ImoveisController@update')->name('update');
Route::post('/delete', 'ImoveisController@delete')->name('delete');
Route::get('/search/{q?}/{v?}', 'ImoveisController@search')->name('search');

Route::post('/api/oauth', 'UserController@oauth')->name('oauth');



