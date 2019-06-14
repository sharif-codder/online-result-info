<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    
    protected $fillable =['batch_code','is_active',];
 
    public function subjects(){

    	return $this->hasMany('App\Subject');
    }

    public function students(){

    	return $this->hasMany('App\Student');

    }

    public function resutl(){

    	return $this->hasMany('App\Result');
    }

}
