<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    protected $table='follow_ups';
    protected $fillable=['follow_up_list','follow_up_date','next_action_list','reminder_topics','reminder_via','follow_pick_date','follow_pick_time','tmsf_id','follow_up_comments','group_id'];
}
