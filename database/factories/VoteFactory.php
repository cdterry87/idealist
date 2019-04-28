<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'idea_id' => factory(App\Idea::class),
    ];
});
