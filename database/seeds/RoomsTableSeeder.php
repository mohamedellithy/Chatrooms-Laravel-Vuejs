<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
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
           $rooms = factory(App\Room::class)->create();
        }
    }
}
