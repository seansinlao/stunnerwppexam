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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/songs', 'SongController@create')->name('create_song');
Route::get('/songs/{song}', 'SongController@edit')->name('edit_song');
Route::delete('/songs/{song}', 'SongController@destroy')->name('delete_song');
Route::put('/songs/{song}', 'SongController@update')->name('update_song');
Route::post('/songs', 'SongController@store')->name('save_song');
