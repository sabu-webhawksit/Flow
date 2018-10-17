<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NdaTamplate extends Model
{
    protected $table="nda_tamplates";
    protected $fillable=['nda_type','nda_body'];
}
