<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientEmployee extends Model
{
    protected $table='client_employees';
    protected $fillable=['skill_set','tms_id','level','quentity','category','others_one','others_two'];
}
