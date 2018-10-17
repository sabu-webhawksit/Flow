<?php

use Illuminate\Database\Seeder;

class PackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pack')->insert([
            [ 'pack_name' => 'Sales Marketing Partners Pack ' ],
            [ 'pack_name' => 'Advisory Pack ' ],
            [ 'pack_name' => 'Advisor & Sales Rep Pack ' ],
            [ 'pack_name' => 'Clients Pack ' ]
            
        ]);
    }
}
