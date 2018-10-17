<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=['Super Admin','Admin','Country Manager','Advisor','Sales & Marketing Leads','Advisory & Sales Rep','Clients'];
        for($i=0;$i<count($roles);$i++){
            DB::table('roles')->insert([
                'name' => $roles[$i]
            ]);  
        }
        
    }
}
