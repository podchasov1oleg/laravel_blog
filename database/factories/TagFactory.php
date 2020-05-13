<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'icon' => 'https://via.placeholder.com/30x30/ff7f7f/333333?text=' . $faker->randomLetter
    ];
});
