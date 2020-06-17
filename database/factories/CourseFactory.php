<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'level' => $faker->word,
        'description' => $faker->text,
        'duration' => $faker->word,
        'total_class' => $faker->numberBetween(4,40),
        'department' => $faker->word,
        'review' => $faker->sentence,

    ];
});
