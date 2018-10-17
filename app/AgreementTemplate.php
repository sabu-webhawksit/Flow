<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgreementTemplate extends Model
{
    protected $table="agreement_tamplates";
    protected $fillable=['agreement_type','agreement_body'];
}

