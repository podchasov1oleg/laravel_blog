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
        $post = new Post;
        $post->title = $request->title;
        $post->intro = $request->title;
        $post->body = $request->body;
        $saved = $post->save();
        return view('pages.admin-posts', ['posts' => Post::all() , 'success' => $saved]);
    }

    public function create()
    {
        return view('pages.admin-create');
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
        return view('pages.admin-edit', ['post' => Post::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $post = Post::find($request->id);

        $post->title = $request->title;
        $post->intro = $request->intro;
        $post->body = $request->body;
        $updated = $post->save();
        return redirect()->action('PostsController@index', ['admin' => 'admin/'])->with(['updated' => $updated]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $deleted = $post->delete();
        return redirect()->action('PostsController@index', ['admin' => 'admin/'])->with(['deleted' => $deleted]);
    }
}
