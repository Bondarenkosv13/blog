<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Like::class, function (Faker $faker) {

    switch (rand(0,1)) {
        case 0:
            $postId = \App\Models\Post::get()->random()->id;
            $message = null;
            break;
        case 1:
            $postId = null;
            $message = \App\Models\Message::get()->random()->id;
            break;
    }

    return [
        'post_id'   => $postId,
        'message_id'=> $message,
        'user_id'   => \App\Models\User::get()->random()->id
    ];
});
