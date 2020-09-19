<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['examname','month','date','year','timeduration','fullmarks','passmarks'];

    public function getRules($fm){
    	return [
    		'examname'=>'required|string',
    		'month'=>'required|string',
    		'date'=>'required|integer|digits_between:1,31',
    		'year'=>'required|integer|between:2000,2050',
    		'timeduration'=>'required|integer',
    		'fullmarks'=>'required|integer',
    		'passmarks'=>"required|integer|max:$fm",
    	];
    }

    
}
