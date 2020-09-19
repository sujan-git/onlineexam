<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    protected $fillable = ['label','status','ref_id'];
}
