<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function adminIndex()
    {
        return view(
            'pages.admin-posts',
            [
                'posts' => DB::table('posts')
                    ->join('tags', 'posts.tag_id', '=', 'tags.id')
                    ->select('posts.*', 'tags.name')
                    ->get()
            ]
        );
    }

    public function index()
    {
        return view(
            'pages.blog',
            [
                'posts' => DB::table('posts')
                    ->where('active', 1)
                    ->orderBy('title', 'asc')
                    ->join('tags', 'posts.tag_id', '=', 'tags.id')
                    ->select('posts.*', 'tags.name', 'tags.icon')
                    ->get(),
                'tags' => Tag::activeTags(),
            ]
        );
    }

    public function deactivate(Request $request)
    {
        $post = Post::find($request->route()->parameter('id'));
        if ($request->active == 'activated') {
            $post->active = 1;
        } elseif ($request->active == 'deactivated') {
            $post->active = 0;
        }
        return redirect()
            ->action('PostsController@adminIndex')
            ->with(['action' => $request->active, 'success' => $post->save()]);
    }

    public function store(Request $request)
    {
        $post = new Post;

        if ($request->image) {
            $file = $request->file('image');
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
        return redirect()
            ->action('PostsController@adminIndex')
            ->with(['action' => 'added', 'success' => $post->save()]);
    }

    public function create()
    {
        return view('pages.admin-post-create');
    }


    public function show($id)
    {
        if (Route::currentRouteName() == 'admin.posts.show') {
            return view('pages.admin-detail', ['post' => Post::find($id)]);
        } else {
            return view('pages.detail', [
                'post' => Post::find($id),
                'tags' => Tag::activeTags()
            ]);
        }
    }

    public function edit($id)
    {
        return view('pages.admin-edit', ['post' => Post::find($id), 'tags' => Tag::all()]);
    }

    public function update(Request $request)
    {
        $post = Post::find($request->id);

        if ($request->image) {
            $file = $request->file('image');
            $path = $file->getClientOriginalName();
            if (!Storage::disk('public')->exists($path)) {
                Storage::disk('public')->put($path, File::get($file));
                $post->image = 'storage/' . $path;
                /*TODO Можно обработать, если не удалось сохрпанить фото*/
            }
        }

        $post->title = $request->title;
        $post->intro = $request->intro;
        $post->tag_id = $request->tag_id;
        $post->body = $request->body;
        return redirect()
            ->action('PostsController@adminIndex')
            ->with(['action' => 'updated', 'success' => $post->save()]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        return redirect()
            ->action('PostsController@adminIndex')
            ->with(['action' => 'deleted', 'success' => $post->delete()]);
    }
}
