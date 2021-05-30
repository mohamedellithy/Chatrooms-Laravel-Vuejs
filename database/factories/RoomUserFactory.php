<?php


use Faker\Generator as Faker;


$factory->define(App\RoomUser::class,function(Faker $faker){
    return [
     'room_id' => App\Room::inRandomOrder()->first()->id,
     'user_id' => App\User::inRandomOrder()->first()->id,
    ];
});
