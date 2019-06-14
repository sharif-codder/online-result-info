<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable =['grade_point','grade','student_id','subject_id','batch_id','session','year'];

    public function subject(){

    	return $this->belongsTo('App\Subject');
    }

    public function student(){

    	return $this->belongsTo('App\Student');
    }

    public function batch(){

    	return $this->belongsTo('App\Batch');
    }
}
