<?php

use Faker\Generator as Faker;

$factory->define(App\message::class,function(Faker $faker){
    return [
        'room_id'   => App\Room::inRandomOrder()->first()->id,
        'sender_id' => App\User::inRandomOrder()->first()->id,
        'message'  => $faker->realText(rand(80,600)),
    ];
});
