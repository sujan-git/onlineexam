<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name','fullmarks','passmarks'];

    public function getAll(){
    	$subjects = $this->get();
    	return $subjects;
    }
}
