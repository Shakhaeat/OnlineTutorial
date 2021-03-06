<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
       'user_id' => factory(\App\User::class),
       'lecture_lists_id' => factory(\App\LectureList::class),
        'comment' => $faker->text,


    ];
});
