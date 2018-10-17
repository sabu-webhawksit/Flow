<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    protected $table='pack';
    protected $fillable = [
        'pack_name',
    ];
    
    public function servicePack(){
        return $this->hasOne(Servicepack::class,'pack_name');
    }
}
