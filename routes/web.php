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

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('posts', 'PostController');
    Route::get('posts/{post}/destroy', 'PostController@destroy')->name('posts.destroy');
});

Route::resource('posts', 'PostController', ['only' => 'show']);
Route::get('/', 'PostController@index')->name('home');

