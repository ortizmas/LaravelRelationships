<?php

use App\Author;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return User::orderByRaw("RAND()")
                ->take(1)
                ->first()
                ->id;
        },
        'title'     => $faker->sentence(4),
        'content'   => $faker->paragraph(4),
        
        'author_id' => function () {
            return Author::orderByRaw("RAND()")
                ->take(1)
                ->first()
                ->id;
        }
    ];
});
