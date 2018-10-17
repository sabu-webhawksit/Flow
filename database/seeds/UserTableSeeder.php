<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     //User Seed ashik
    public function run()
    {
       factory(App\User::class, 20)->create();
    }
}
