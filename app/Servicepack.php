<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicepack extends Model
{
    protected $table='service_pack';
    protected $fillable=['pack_name','country_name','pack_file_name'];
    
    public function pack(){
        return $this->belongsTo(Pack::class,'pack_name');
    }
}
