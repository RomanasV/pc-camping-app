<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Camping::class, function (Faker $faker) {
    $tags_array = $faker->words($nb = 3, $asText = false);
    $tags_string = implode(",", $tags_array);

    return [
        'name' => $faker->text(rand(15, 30)),
        'description' => $faker->text(rand(300, 700)),
        'stars' => $faker->biasedNumberBetween($min = 1, $max = 5, $function = 'sqrt'),
        'website' => $faker->url,
        'country' => $faker->country,
        'city' => $faker->city,
        'ranking' => $faker->randomFloat($nbMaxDecimals = 1, $min = 1, $max = 10),
        'tags' => $tags_string,
        'user_id' => 1,
        'placeholder_image' => 'default_placeholder.jpg',
    ];
});
