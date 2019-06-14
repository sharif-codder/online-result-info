<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    
    protected $fillable = ['name','faculty_id','batch_id','session','year','is_active'];

    public function result(){

    	return $this->hasMany('App\Result');
    }

    public function batch(){

    	return $this->belongsTo('App\Batch');
    }

    public function faculty(){

    	return $this->belongsTo('App\Faculty');
    }

}
