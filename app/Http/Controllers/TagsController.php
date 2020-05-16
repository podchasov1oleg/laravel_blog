<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TagsController extends Controller
{
    public function index()
    {
        return view('pages.admin-tags', ['tags' => Tag::all()]);
    }

    public function store(Request $request)
    {
        $tag = new Tag;
        if ($request->image) {
            $file = $request->file('image');
            $path = $file->getClientOriginalName();
            if (Storage::disk('public')->exists($path)) {
                $path = '_.' . $file->getClientOriginalName();
            }
            Storage::disk('public')->put($path, File::get($file));
            $tag->icon = 'storage/' . $path;
        }

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
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $path = '/storage/' . $name;
            if ($file->getClientOriginalExtension() != 'svg') {
                $resize_image = Image::make($file->getRealPath());
                $resize_image->resize(30, 30, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path() . $name);
            } else {
                Storage::disk('public')->put($name, File::get($file));
            }
            $tag->icon = $path;
        }

        $tag->name = $request->tag_name;
        $updated = $tag->save();
        return redirect()
            ->action('TagsController@index')
            ->with(['action' => 'updated', 'success' => $updated]);
    }
}
