<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Channel;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Channel::class, function (Faker $faker) {
    $name = ucfirst($faker->unique()->words(2, true));

    return [
        'name' => $name,
        'slug' => Str::slug($name),
    ];
});
