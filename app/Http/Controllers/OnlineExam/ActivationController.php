<?php

namespace App\Http\Controllers\OnlineExam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Activation;
use App\Model\Exam;
use App\Model\Subject;
use App\Model\FinalSubject;
use Illuminate\Validation\Rule;

class ActivationController extends Controller
{
	public function __construct(Activation $activate,Exam $exam,Subject $sub){
		$this->activate  = $activate;
		$this->exam = $exam;
		$this->sub = $sub;

	}

	public function index(){
		$exam = $this->exam->get();
		$param = $this->activate->get();
		return view('admin.activation.activationform')->with('param',$param);
	}

	public function getActiveExamList(){
		$activeexam = $this->exam->where('status','active')->first();
		
		return view('admin.activation.activeexamlist')->with('activeexam',$activeexam);
	}
	public function examActivationForm(){
		$activeexam = $this->exam->where('status','active')->first();
		if(!$activeexam){
			$exam = $this->exam->get();
			$sub = $this->sub->get();
			if(!$exam){
				$exam = null;
			}
			return view('admin.activation.examactivation')->with('exam',$exam);
		}else{
			return view('admin.activation.activeexamlist')->with('activeexam',$activeexam);
		}
			
	}

	public function deactivateExam(Request $request){
		$this->exam = $this->exam->findOrFail($request->id);$data['status'] = 'inactive';
		$this->exam->fill($data);
		$succ = $this->exam->save();
		if($succ){
				$request->session()->flash('success', ' Deactivated Successfully');
			}else{
				$request->session()->flash('error', 'Problem Deactivation');
			}

		return redirect()->route('activate.exam');
	}
	

	

	public function activateExam(Request $request){
		//dd($request);
		$request->validate([
		    'exam_id' => 'bail|required|integer|exists:exams,id',
		    //'sub_id*.'=>'required|integer|exists,subjects,id',
		    

		]);
		
		 $this->exam = $this->exam->find($request->exam_id);
		 //dd($this->exam);
		 if($this->exam != NULL){
		 	$data['status'] = 'active';
		 	$this->exam->fill($data);
		 	$succ = $this->exam->save();
		 	if($succ){
		 			$request->session()->flash('sucess', 'Information Saved Sucessfully');
		 	}else{
		 		$request->session()->flash('error', 'Unable To Save Information');
		 	}

		 	return redirect()->route('activeexam.list');
		 }

		 
		
	}

	public function settings(Request $request){
		$param = $this->activate->get();
		return view('admin.activation.activationform')->with('param',$param);
		
	}

	public function activation($id,$request){
			$this->activate = $this->activate->find($id);
			$data['status'] = 'active';
			$this->activate->fill($data);
			$succ = $this->activate->save();
			if($succ){
				$request->session()->flash('success', 'Activated Successfully');
			}else{
				$request->session()->flash('error', 'Problem In Deactivation');
			}
			
	}

	public function deactivation($id, $request){
			$this->activate = $this->activate->find($request->id);
			$data['status'] = 'inactive';
			$this->activate->fill($data);
			$succ = $this->activate->save();
			if($succ){
				$request->session()->flash('success', ' Deactivated Successfully');
			}else{
				$request->session()->flash('error', 'Problem Deactivation');
			}

	}

	public function saveSettings(Request $request){
		if(isset($request->id , $request->en)){
			if($request->en == 'set'){
				$this->activation($request->id, $request);
			}elseif($request->en == 'unset'){
				$this->deactivation($request->id, $request);
			}
		}else{
			$request->session()->flash('error', 'Invalid Request');
		}
		return redirect()->back();
	}
    
}
