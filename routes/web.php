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

Route::get('blog', 'PostsController@index');

Route::get('blog/{id}', 'PostsController@show');

Route::resource('posts', 'PostsController');

Route::view('admin', 'pages.admin');
