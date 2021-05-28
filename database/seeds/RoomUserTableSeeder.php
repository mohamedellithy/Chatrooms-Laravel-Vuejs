<?php

use Illuminate\Database\Seeder;

class RoomUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $count = 3;
        for($insertRooms = 1;$insertRooms<=$count;$insertRooms++){
           $RoomUser = factory(App\RoomUser::class)->create();
        }
    }
}
