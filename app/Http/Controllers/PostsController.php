<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PostsController extends Controller
{
    public function index($admin = '')
    {
        if ($admin) {
            return view('pages.admin-posts', ['posts' => Post::all()]);
        } else {
            return view('pages.blog', ['posts' => Post::all()]);
        }
    }

    public function store(Request $request)
    {
        Post::all();
    }

    public function create()
    {

    }


    public function show($id)
    {
        if (Route::currentRouteName() == 'admin.posts.show') {
            return view('pages.admin-detail', ['post' => Post::find($id)]);
        } else {
            return view('pages.detail', ['post' => Post::find($id)]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
