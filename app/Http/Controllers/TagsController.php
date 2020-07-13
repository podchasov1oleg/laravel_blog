<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TagsController extends Controller
{
    public function index()
    {
        return view('pages.admin-tags', ['tags' => Tag::all()]);
    }

    public function section($section)
    {
        $id = Tag::where('name', '=', $section)->first()->id;
        return view('pages.blog',
            [
                'posts' => Tag::find($id)->posts,
                'tags' => DB::table('tags')
                    ->select('tags.id', 'tags.name', 'tags.icon')
                    ->distinct()
                    ->leftJoin('posts', 'tags.id', '=', 'posts.tag_id')
                    ->whereNotNull('posts.id')
                    ->orderBy('tags.id')
                    ->get(),
                'title' => $section
            ]
        );
    }

    private function saveImage(UploadedFile $file)
    {
        $name = $file->getClientOriginalName();
        $path = '/storage/' . $name;
        if ($file->getClientOriginalExtension() != 'svg') {
            $resize_image = Image::make($file->getRealPath());
            $resize_image->resize(30, 30, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('app/public') . '/' . $name);
        } else {
            Storage::disk('public')->put($name, File::get($file));
        }
        return $path;
    }

    public function store(Request $request)
    {
        //TODO прикрутить валидацию на контроллер постов
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|max:255'
        ]);

        $tag = new Tag;

        $path = $this->saveImage($request->file('image'));
        $tag->icon = $path;

        $tag->name = $request->name;
        $saved = $tag->save();
        return redirect()
            ->action('TagsController@index')
            ->with(['action' => 'added', 'success' => $saved]);
    }

    public function destroy($id)
    {
        $post = Tag::find($id);
        $deleted = $post->delete();
        Post::where('tag_id', '=', $id)->update(['tag_id' => null]);
        return redirect()
            ->action('TagsController@index')
            ->with(['action' => 'deleted', 'success' => $deleted]);
    }

    public function create()
    {
        return view('pages.admin-tag-create');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $tag = Tag::find($request->route()->parameter('id'));

        if ($request->image) {
            $path = $this->saveImage($request->file('image'));
            $tag->icon = $path;
        }

        $tag->name = $request->tag_name;
        $updated = $tag->save();
        return redirect()
            ->action('TagsController@index')
            ->with(['action' => 'updated', 'success' => $updated]);
    }
}
