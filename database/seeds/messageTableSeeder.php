<?php

use Illuminate\Database\Seeder;

class messageTableSeeder extends Seeder
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
           $message = factory(App\message::class)->create();
        }
    }
}
