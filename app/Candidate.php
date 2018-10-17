<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table="candidates";
    protected $fillable=['candidate_name','candidate_skills','candidate_experience',
    'joining_date','candidate_cv','tmsf_id','category','reporting_status','initial_report',
    'rating','reported_by','others_one','others_two', 'status','orientation_package','talent_data'
    ];
}
