<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Idea;
use Faker\Generator as Faker;

$factory->define(Idea::class, function (Faker $faker) {
    return [
        'idea' => $faker->name,
        'user_id' => factory(App\User::class),
    ];
});
