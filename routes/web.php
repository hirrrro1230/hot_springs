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

// Users系の処理を呼び出す用
Route::resource('users', 'UsersController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

//Springs系の処理を呼び出す用
Route::resource('springs', 'SpringsController');
Route::get('/home', 'HomeController@index')->name('home');
// Springの削除
Route::delete('/spring/{id}', 'SpringsController@destroy')->name('springs.destroy');
// Springの編集画面
Route::get('/spring/{id}/edit', 'SpringsController@edit')->name('springs.edit');

//Comments系の処理を呼び出す用
Route::resource('comments', 'CommentsController');
// Commentの削除
Route::delete('/comment/{id}', 'CommentsController@destroy')->name('comments.destroy');
// Commentの編集画面
Route::get('/comment/{id}/edit', 'CommentsController@edit')->name('comments.edit');