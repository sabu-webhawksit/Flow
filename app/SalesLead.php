<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesLead extends Model
{
    //
    protected $table='sales_leads';
    
    protected $fillable=['name','position','company','country','state','zip_code','linkdin','others_link','pitching_for','reference','country_manager','create_by','client_id','comments','pack','extras', 'status', 'created_by'];
    
    protected $casts = ['pack'=>'array'];
    
    public function roles(){
        return $this->belongsTo( Role::class, 'pitching_for');
    }
    
    public function country_manager_name(){
        return $this->belongsTo( User::class, 'country_manager');
    }
    public function create_by_name(){
        return $this->belongsTo( User::class, 'create_by');
    }
    
    public static function boot()
    {
        parent::boot();

        static::creating(function($model){
            
            $model->created_by = auth()->user()->id;
            
        });
    }
    
}
