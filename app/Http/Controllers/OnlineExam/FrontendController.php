<?php

namespace App\Http\Controllers\OnlineExam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Question;
use App\Model\Registration;
use App\Model\Exam;
use Session;

class FrontendController extends Controller
{
    public function __construct(Question $question, Registration $register, Exam $exam){
    	$this->question = $question;
        $this->register = $register;
        $this->exam = $exam;
    }

    public function index(){
    	return view('index');
    }

    public function examView($student){
        $activeexam = $this->exam->where('status','active')->first();
        if(!$activeexam){
            \Session::flash('error','Examinations are currently not active');
            return redirect()->back();
        }
    	$chemistry = $this->question->getFinalQuestionForExam($activeexam->id,4);
        $gk = $this->question->getFinalQuestionForExam($activeexam->id,6);
        
    	return view('frontend.exam.examview')
                ->with('student',$student)
    			->with('chemistry', $chemistry)
                ->with('gk', $gk);
    }


    public function studentLogin(Request $request){
         
        if((session()->get('examinee') != NULl) && session()->get('loginstatus') == true ){
            return $this->examView(session()->get('examinee'));
        }
        return view('stdlogin.stdlogin');
    }

    public function verifyStudentLogin(Request $request){
       // dd($request);
        $request->validate([
            'search_id'=>'required',
            'symbol_no'=>'required'
        ]);
        $student = $this->register->where([
                ['symbol_no','=',$request->symbol_no],
                ['search_id','=',$request->search_id],
            ])->first();
        if(!$student){
            $request->session()->flash('error','Your Information Was Not Found In System.Contact Administration Soon');
            return redirect()->back();
        }
        if($student->status != 'verified'){
            $request->session()->flash('error','Your Registration Is Not Verified.Contact Administration Soon');
            return redirect()->back();
        }
        Session::put('examinee', $student);
        Session::put('loginstatus', true);
        return $this->examView($student);
    }
}
