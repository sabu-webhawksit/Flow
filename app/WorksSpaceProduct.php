<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorksSpaceProduct extends Model
{
    protected $table="worksspacesproducts";
    protected $fillable=[
        "tms_id","group_id","item","qty","starting_date","deadline","cost","notes","others_one","others_two"
        ];
}
