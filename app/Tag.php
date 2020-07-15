<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    protected $fillable = ['name', 'icon'];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public static function activeTags()
    {
        return DB::table('tags')
            ->select('tags.id', 'tags.name', 'tags.icon')
            ->distinct()
            ->leftJoin('posts', 'tags.id', '=', 'posts.tag_id')
            ->whereNotNull('posts.id')
            ->orderBy('tags.id')
            ->get();
    }
}
