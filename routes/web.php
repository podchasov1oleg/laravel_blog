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
//Posts
Route::get('posts/{id}', 'PostsController@show')->where('id', '[0-9]+')->name('posts.show');
Route::get('posts', 'PostsController@index')->name('posts.list');
//Portfolio
Route::get('portfolio', 'PortfolioController@index')->name('portfolio.list');
Route::get('portfolio/{id}', 'PortfolioController@show')->where('id', '[0-9]+')->name('portfolio.show');
//Admin routes, Posts resource
Route::middleware(['auth'])->group(function () {
    //Portfolio routes
    Route::get('admin/portfolio/create', 'PortfolioController@create')->name('portfolio.create');
    Route::get('admin/portfolio', 'PortfolioController@indexAdmin')->name('portfolio.admin.list');
    Route::post('admin/portfolio', 'PortfolioController@store')->name('portfolio.store');
    Route::get('admin/portfolio/{id}/edit', 'PortfolioController@edit')->where('id', '[0-9]+')->name('portfolio.edit');
    Route::patch('admin/portfolio/{id}', 'PortfolioController@update')->where('id', '[0-9]+')->name('portfolio.edit');
    Route::delete('admin/portfolio/{id}', 'PortfolioController@destroy')->where('id', '[0-9]+')->name('portfolio.delete');
    //Posts routes
    Route::get('admin/posts', 'PostsController@adminIndex')->name('admin.posts.list');
    Route::get('admin/posts/{id}', 'PostsController@show')->where('id', '[0-9]+')->name('admin.posts.show');
    Route::delete('admin/posts/{id}/destroy', 'PostsController@destroy')->where('id', '[0-9]+')->name('post.delete');
    Route::get('admin/posts/{id}/edit', 'PostsController@edit')->where('id', '[0-9]+')->name('post.edit');
    Route::patch('admin/posts/{id}/deactivate', 'PostsController@deactivate')->where('id', '[0-9]+')->name('post.deactivate');
    Route::patch('admin/posts', 'PostsController@update')->name('post.update');
    Route::get('admin/posts/create', 'PostsController@create')->name('admin.posts.create');
    Route::post('admin/posts', 'PostsController@store')->name('posts.store');
    //Tags routes
    Route::get('admin/tags', 'TagsController@index')->name('tags.list');
    Route::get('admin/tags/create', 'TagsController@create')->name('tags.create');
    Route::post('admin/tags', 'TagsController@store')->name('tags.store');
    Route::delete('admin/tags/{id}/destroy', 'TagsController@destroy')->where('id', '[0-9]+')->name('tag.destroy');
    Route::patch('admin/tags/{id}/update', 'TagsController@update')->where('id', '[0-9]+')->name('tag.update');
    //Index route
    Route::view('admin', 'pages.admin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
