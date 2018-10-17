<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorksSpaceItem extends Model
{
    protected $table="worksspacesitems";
    protected $fillable=[
        'tms_id','number_of_hire','supervisor','team_member','invoice','estimates','pc','mac','others_one','others_two'
        ];
}
