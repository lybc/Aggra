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

Route::get('/', 'IndexController@index')->name('home');
Route::get('/categories/{category}', 'IndexController@chooseCategory')->name('index.chooseCategory');
Route::get('/posts/{point}', 'PostController@show')->name('blog.posts.show');
