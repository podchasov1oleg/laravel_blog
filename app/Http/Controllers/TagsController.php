<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TagsController extends Controller
{
    public function index()
    {
        return view('pages.admin-tags', ['posts' => Tag::all()]);
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
        return redirect()
            ->action('TagsController@index')
            ->with(['action' => 'deleted', 'success' => $deleted]);
    }

    public function create()
    {
        return view('pages.admin-tag-create');
    }

    public function update($request)
    {
        $tag = Tag::find($request->id);

        if ($request->image) {
            $file = $request->file('image');
            $path = $file->getClientOriginalName();
            if (!Storage::disk('public')->exists($path)) {
                Storage::disk('public')->put($path, File::get($file));
                $tag->icon = 'storage/tag_icons/' . $path;
            }
        }

        $tag->name = $request->name;
        $updated = $tag->save();
        return redirect()
            ->action('TagsController@index')
            ->with(['action' => 'updated', 'success' => $updated]);
    }
}
