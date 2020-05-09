<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

        if ($request->image) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $path = $file->getClientOriginalName();
            if (Storage::disk('public')->exists($path)) {
                $path = '_.' . $file->getClientOriginalName();
                /*TODO Можно обработать, если не удалось сохрпанить фото*/
            }
            Storage::disk('public')->put($path, File::get($file));
            /*TODO сделать заглушку, если файла нет*/
            $post->image = 'storage/' . $path;
        }

        $post->title = $request->title;
        $post->intro = $request->title;
        $post->body = $request->body;
        $saved = $post->save();
        return redirect()->action('PostsController@index', ['admin' => 'admin/'])->with(['success' => $saved]);
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

    public function edit($id)
    {
        return view('pages.admin-edit', ['post' => Post::find($id)]);
    }

    public function update(Request $request)
    {
        $post = Post::find($request->id);

        if ($request->image) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $path = $file->getClientOriginalName() . '.' . $extension;
            if (!Storage::disk('public')->exists($path)) {
                Storage::disk('public')->put($path, File::get($file));
                $post->image = 'storage/' . $path;
                /*TODO Можно обработать, если не удалось сохрпанить фото*/
            }
        }

        $post->title = $request->title;
        $post->intro = $request->intro;
        $post->body = $request->body;
        $updated = $post->save();
        return redirect()->action('PostsController@index', ['admin' => 'admin/'])->with(['updated' => $updated]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $deleted = $post->delete();
        return redirect()->action('PostsController@index', ['admin' => 'admin/'])->with(['deleted' => $deleted]);
    }
}
