<?php

use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
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
        for($insertUser = 1;$insertUser<=$count;$insertUser++){
           $users = factory(App\User::class)->create();
        }
    }
}
