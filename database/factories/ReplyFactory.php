<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Reply;
use App\Discussion;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    $user_id = User::all()->random()->id;
    $discussion_id = Discussion::all()->random()->id;

    return [
        'user_id' => $user_id,
        'discussion_id' => $discussion_id,
        'content' => $faker->sentences(5, true),
    ];
});
