<?php

use Illuminate\Support\Facades\Route;

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
    return view('pages.index', ['page' => 'main']);
});

//Route::get('posts', 'PostsController@index');

Route::get('posts/{id}', 'PostsController@show')->name('posts.show');
Route::get('admin/posts/{id}', 'PostsController@show')->name('admin.posts.show');

Route::view('admin', 'pages.admin');

Route::get('{admin?}posts', 'PostsController@index')->where(['admin' => 'admin/|']);
