<?php

namespace App\Http\Controllers\OnlineExam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Activation;
use App\Model\Exam;
use App\Model\FinalSubject;
class ActivationController extends Controller
{
	public function __construct(Activation $activate,Exam $exam){
		$this->activate  = $activate;
		$this->exam = $exam;

	}

	public function index(){
		$exam = $this->exam->get();
		return view('admin.activation.activationform')->with('exam',$exam);
	}

	public function save(Request $request){


	}
    
}
