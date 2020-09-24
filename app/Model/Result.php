<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
	protected $fillable = ['reg_id','question_id','answer','score','attempt'];
	
    protected $casts = [
        'question_id' => 'array',
        'answer' => 'array',
    ];
}
