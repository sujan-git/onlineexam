<?php

namespace App\Http\Controllers\OnlineExam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Question;
use App\Model\Subject;
use App\Model\Exam;
use App\Model\Relation;
use Auth;


class QuestionController extends Controller
{
    public function __construct(Question $question, Subject $subj, Exam $exam,Relation $relation){
    	$this->question = $question;
        $this->subj = $subj;
        $this->exam = $exam;
        $this->relation = $relation;
    }

    public function create(){
        $subj = $this->subj->get();
    	return view('admin.question')->with('subj',$subj);
    }

    public function add(Request $request){
    	//dd(isset($request->is_entry[1]));
    	if($request->question){
    		foreach($request->question as $key=>$question){
                $data = array();
                $data['question'] = $question;
                if(isset($request->is_entry[$key])){
                    $data['optA'] = null;
                    $data['optB'] = null;
                    $data['optC'] = null;
                    $data['optD'] = null;
                    $data['is_entry'] = 1;
                }else{
                    $data['optA'] = $request->optA[$key];
                    $data['optB'] = $request->optB[$key];
                    $data['optC'] = $request->optC[$key];
                    $data['optD'] = $request->optD[$key];
                    $data['is_entry'] = 0;
                }
                $data['answer'] = $request->answer[$key];
                $data['added_by'] = Auth::user()->id;
                $data['subject_id'] = $request->subject_id;
                //dd($data);
                $question = new Question();
                $question->fill($data);
                $succ = $question->save();
                if(!$succ){
                    break;
                }
            }
            return 'Submission Successful';
    	}
    }

    public function list(Request $request){
        $id_ = Auth::user()->id;
        /* May require to fetch question by subject, question relevant to current exam context in future*/
        $questions = $this->question->getQuestionBySubject($request->id);
        return view('admin.question.list')->with('questions',$questions);
    }

    public function edit(Request $request){
        $question = $this->question->findOrFail($request->id);
        if(!empty($question)){
           return response()->json(['status'=>true,'question'=>$question]); 
       }else{return response()->json(['status'=>false]);}
        
    }

    public function update(Request $request){
        //Validate Request First//

        if(isset($request->question_id) && ($request->question_id != null)){
            $this->question = $this->question->find($request->question_id);
            if(!$this->question){
                return response()->json(['status'=>false,'msg'=>'Question Not Found']);
            }

            $data = array();
            $data['question'] = $request->question;
                if(isset($request->is_entry)){
                    $data['optA'] = null;
                    $data['optB'] = null;
                    $data['optC'] = null;
                    $data['optD'] = null;
                    $data['is_entry'] = 1;
                }else{
                    $data['optA'] = $request->optA;
                    $data['optB'] = $request->optB;
                    $data['optC'] = $request->optC;
                    $data['optD'] = $request->optD;
                    $data['is_entry'] = 0;
                }
                $data['answer'] = $request->answer;
                $data['added_by'] = Auth::user()->id;
                $this->question->fill($data);
                $succ = $this->question->save();
                if($succ){
                    $msg = 'Question Updated Successfully';
                    $status = true;
                }
                else{
                    $msg = 'Problem While Updating Question';
                     $status = false;
                }
            return response()->json(['status'=>$status,'msg'=>$msg]);
        }
                
    }

    public function deleteWithUpdate(Request $request){
        
    }


    public function finalQuestion(Request $request){

        if($request->id){
            $subject_id = $request->id;
            $questions = $this->question->where('subject_id',$request->id)->get();
            if(!$questions->isEmpty()){
                $exam = $this->exam->orderBy('id', 'DESC')->get();  //Try to get Exam Data Having Active Status
                //dd($exam);
                return view('admin.question.finalqn')->with(compact('questions','exam','subject_id'));
            }else{
                $exam= null;
                \Session::flash('error','No Questions Are Available For This Subject');
                return view('admin.question.finalqn')->with('exam',$exam);
            }
        }else{
            return 'ERROR. In Request';
        }
    }

    public function finalQuestionSave(Request $request){

        if($request->method() != 'POST'){
            return redirect()->back();
        }
        

        $subjcheck = $this->relation->where('subject_id',$request->subject_id)->where('exam_id',$request->exam_id)->first();
        if($subjcheck != null){
            \Session::flash('error','Question For The Selected Subject or Exam Is Already Finalized');
            return redirect()->back();
        }

        if(count($request->finalqn) != 10){
            \Session::flash('error',' 10  Questions Are Permitted For Submission. You Have Submiited:'.count($request->finalqn));
            return redirect()->back();

        }
        foreach($request->finalqn as $key=>$question){
            $relation = new Relation();
            $relation['question_id'] = $question;
            $relation['exam_id']= $request->exam_id;
            $relation['subject_id'] = $request->subject_id;
             $succ = $relation->save();
        }

        if($succ){
            \Session::flash('success','Questions Are Finalized Sucessfully'); 
        }else{
            \Session::flash('error','Unable To Finalize QUestions'); 
        }
        return redirect()->back();
    }

    public function getFinalQuestionForExam(){
        $all_qn = $this->question->getFinalQuestionForExam(112,4);
        dd($all_qn);
    }
}
