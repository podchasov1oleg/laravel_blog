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
//Main page
Route::get('/', function () {
    return view('pages.index', ['page' => 'main']);
});
//Public part
Route::get('posts/{id}', 'PostsController@show')->name('posts.show');
//Admin routes, Posts resource
Route::get('{admin?}posts', 'PostsController@index')->where(['admin' => 'admin/|'])->name('posts.list');
Route::get('admin/posts/{id}', 'PostsController@show')->where('id', '[0-9]+')->name('admin.posts.show');
Route::delete('admin/posts/{id}/destroy', 'PostsController@destroy')->where('id', '[0-9]+')->name('post.delete');
Route::get('admin/posts/{id}/edit', 'PostsController@edit')->where('id', '[0-9]+')->name('post.edit');
Route::patch('admin/posts/{id}/deactivate', 'PostsController@deactivate')->where('id', '[0-9]+')->name('post.deactivate');
Route::patch('admin/posts', 'PostsController@update')->name('post.update');
Route::get('admin/posts/create', 'PostsController@create')->name('admin.posts.create');
Route::post('admin/posts', 'PostsController@store')->name('posts.store');

Route::view('admin', 'pages.admin');

