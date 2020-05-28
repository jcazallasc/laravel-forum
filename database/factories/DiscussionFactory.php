<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Channel;
use App\Discussion;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Discussion::class, function (Faker $faker) {
    $title = ucfirst($faker->unique()->words(2, true));
    $user_id = User::where('email', 'jcazallasc@gmail.com')->first()->id;
    $channel_id = Channel::all()->random()->id;

    return [
        'user_id' => $user_id,
        'channel_id' => $channel_id,
        'title' => $title,
        'slug' => Str::slug($title),
        'content' => $faker->sentences(5, true),
    ];
});
