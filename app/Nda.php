<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nda extends Model
{
    protected $table='nda';
    protected $fillable=['nda_type','tms_id','nda_body'];
}
