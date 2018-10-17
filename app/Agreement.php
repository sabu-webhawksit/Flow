<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    protected $table='agreements';
    protected $fillable=['agreement_type','tms_id','agreement_body'];
}
