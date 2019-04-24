<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Idea;
use Faker\Generator as Faker;

$factory->define(Idea::class, function (Faker $faker) {
    return [
        'idea' => $faker->sentence(rand(5, 10)),
        'user_id' => 1,
        'votes' => $faker->numberBetween(0, 50),
        // 'user_id' => factory(App\User::class),
    ];
});
