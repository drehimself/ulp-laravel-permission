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

Route::middleware('auth')->group(function () {
    Route::get('/posts/create', 'PostsController@create')->name('posts.create')->middleware('permission:create posts');
    Route::post('/posts', 'PostsController@store')->name('posts.store')->middleware('permission:create posts');
    Route::get('/posts/{post}/edit', 'PostsController@edit')->name('posts.edit')->middleware('permission:update posts');
    Route::patch('/posts/{post}', 'PostsController@update')->name('posts.update')->middleware('permission:update posts');
    Route::delete('/posts/{post}', 'PostsController@destroy')->name('posts.destroy')->middleware('permission:delete posts');
});

Route::get('/posts', 'PostsController@index')->name('posts.index');
// Route::get('/posts/create', 'PostsController@create')->name('posts.create');
// Route::post('/posts', 'PostsController@store')->name('posts.store');
Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');
// Route::get('/posts/{post}/edit', 'PostsController@edit')->name('posts.edit');
// Route::patch('/posts/{post}', 'PostsController@update')->name('posts.update');
// Route::delete('/posts/{post}', 'PostsController@destroy')->name('posts.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
