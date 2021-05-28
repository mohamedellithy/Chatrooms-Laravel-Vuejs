<?php

use Faker\Generator as Faker;

$factory->define(App\Room::class, function (Faker $faker) {
    return [
        'title' => '',
        'creator_id' => App\User::inRandomOrder()->first()->id,
    ];
});
