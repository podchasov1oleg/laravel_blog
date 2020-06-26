<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PortfolioImage;
use Faker\Generator as Faker;

$factory->define(PortfolioImage::class, function (Faker $faker) {
    return [
        'src' => 'https://via.placeholder.com/825x464/ff7f7f/333333?text=' . $faker->word,
        'portfolio_id' => $faker->numberBetween(1, 10)
    ];
});
