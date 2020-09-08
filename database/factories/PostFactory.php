<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Post::class, function (Faker $faker) {
    return [
        'user_id'           => \App\Models\User::get()->random()->id,
        'title'             => $faker->unique()->word,
        'small_description' => $faker->sentence(rand(3,5), true),
        'description'       => $faker->text(300),
        'image'             => 'public/images/' . $faker->file(
                Storage::disk('public')->path('images'),
                Storage::disk('public')->path('seed_images'), false),
        'is_published'      => rand(false, true),
        'published_at'      => $faker->date(),
    ];
});
