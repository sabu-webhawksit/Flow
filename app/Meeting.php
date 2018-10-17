<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $table='meetings';
    protected $fillable=['meeting_time_zone','meeting_date','meeting_time','meeting_type','meeting_address','tmsf_id','comments','status'];
    
    
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
