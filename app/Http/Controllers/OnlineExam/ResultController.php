<?php

namespace App\Http\Controllers\OnlineExam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Result;
use App\Model\Question;

class ResultController extends Controller
{
    public function __construct(Result $result, Question $question){
    	$this->result = $result;
    	$this->question = $question;
    }

    public function saveResult(Request $request){
    	//dd($request);
        /*Unset The Session Info*/
            $request->session()->forget('examinee');
            $request->session()->forget('loginstatus');
        /*Unset The Session Info*/ 
    	$data['reg_id'] = $request->reg_id;
    	$data['attempt'] = count($request->answer);
    	$data['question_id'] = array_keys($request->answer);
    	$data['answer'] = array_values($request->answer);
    	$score = 0;
	    /*-----Calculate Score---------*/
	    	foreach($data['question_id'] as $key=>$question){
	    		$answer = ($this->question->find($question))->answer;
	    		if($answer == $data['answer'][$key]){
	    			$score++;
	    		}
	    	}
	    /*-----------------------------*/
    	$data['score'] = $score;
    	$this->result->fill($data);
    	$succ = $this->result->save();
    	if($succ){
    		return 'Saved In DB';
    	}else{
    		return 'Failure In Saving';
    	}

    }
}
