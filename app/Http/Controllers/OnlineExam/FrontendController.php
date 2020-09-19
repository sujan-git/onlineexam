<?php

namespace App\Http\Controllers\OnlineExam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Question;

class FrontendController extends Controller
{
    public function __construct(Question $question){
    	$this->question = $question;
    }

    public function index(){
    	return view('index');
    }

    public function examView(){
    	$chemistry = $this->question->getFinalQuestionForExam(112,4);
    	return view('frontend.exam.examview')
    			->with('chemistry', $chemistry);
    }


    /*Just For Ramailo. Meme Banauna Ko Lagi Algi Lako Belama*/
    public function getAllMemes(){
    	
    }
}
