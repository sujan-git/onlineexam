<?php

namespace App\Http\Controllers\OnlineExam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Subject;

class RoleController extends Controller
{
    public function admin(Request $request){
    	return view('admin.index');
    }

    public function teacher(Request $request){
    	return view('teacher.index');
    }
}
