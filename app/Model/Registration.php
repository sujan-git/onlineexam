<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = ['fname','midname','lname','fathername','mothername','address','dob','phone','email','gender','profile','verify_document','search_id','status','symbol_no'];

    public function getRules(){
    	return [
    		'fname'=>'required|string',
    		'midname'=>'sometimes|string',
    		'lname'=>'required|string',
    		'fathername'=>'required|string',
    		'mothername'=>'required|string',
    		'address'=>'required|string',
    		'dob'=>'required|date',
    		'phone'=>'required',
    		'email'=>'required|email',
    		'gender'=>'required|string|in:m,f,o',
    		'profile'=>'sometimes|image|max:1000',
    		'verify_document'=>'sometimes|image|max:1000',

    	];
    }
}
