<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Message::class, function (Faker $faker) {
    return [
        'post_id'   => \App\Models\Post::get()->random()->id,
        'user_id'   => \App\Models\User::get()->random()->id,
        'parent_id' => null,
        'content'   => $faker->sentence(rand(3,6), true)
    ];
});
