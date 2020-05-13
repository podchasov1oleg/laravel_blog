<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'intro' => $faker->paragraph,
        'body' => $faker->text,
        'image' => 'https://via.placeholder.com/795x447/ff7f7f/333333?text=' . $faker->word,
        'active' => 1,
        'tag_id' => null
    ];
});
