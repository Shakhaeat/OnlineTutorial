<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LectureList;
use Faker\Generator as Faker;

$factory->define(LectureList::class, function (Faker $faker) {
    return [
    	'course_id' => factory(\App\Course::class),
        'lecture_title' => $faker->title,
        'lecture_file' =>  $faker->imageUrl($width = 200, $height = 200),
   ];
});
