<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission=['Sales Lead Button','Setup Meeting Button','Team Member Interview','Work Station List','Service Pack','Others Meeting','Role Management','Infra Istructure','Network','Admin HR','Core Team','Accounts'];
        $slug=['sales-lead-btn','setup-meeting-btn','team-interview','work-station-list','service-pack','others-meeting','roles','infra-structure','network','admin-hr','core-team','accounts'];
        for($i=0;$i<count($permission);$i++){
           DB::table('permissions')->insert([
            'name' => $permission[$i],
            'slug' => $slug[$i]
        ]); 
        }
    }
}
