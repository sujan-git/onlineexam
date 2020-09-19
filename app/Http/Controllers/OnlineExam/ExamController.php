<?php

namespace App\Http\Controllers\OnlineExam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Model\Exam;
use Validator;
use Illuminate\Support\Facades\Input;

class ExamController extends Controller
{
    public function __construct(Exam $exam){
    	$this->exam = $exam;
    }

    public function create(){
    	return view('admin.exam');
    }

    public function addExamInfo(Request $request){
    	//dd($request);
    	$validate = Validator::make($request->all(),$this->exam->getRules($request->fullmarks));
    	if($validate->fails()){
            $errors =  $validate->messages();
            //dd($errors);
            \Session::flash('error','Problem in adding Exam Information'); 
            return redirect()->back()->with('errors',$errors)->withInput(Input::all());
        }
        $act = (isset($request->id))?'Updat':'Add';
        if (isset($request->id)) {
            $this->exam = $this->exam->find($request->id);
        }

        $data = $request->except(['_token']);
        $this->exam->fill($data);
        $success = $this->exam->save();
        if ($success) {
            $status=true;
            $msg = "Exam Data ".$act."ed Successfully";
            
        } else {
            $status = false;
            $msg = "Problem While  ".$act."ing Exam Data ";
        }
        
        return response()->json(['status'=>$status,'msg'=>$msg, 'act'=>$act]);
        
    }

    public function list(Request $request){
        $examdata = $this->exam->get();
       return view('admin.examlist')
            ->with('examdata',$examdata);
    }

    public function delete(Request $request){

        $this->exam = $this->exam->findOrFail($request->id);

        if (!$this->exam) {
            return response()->json([
            'status'=>false,
            'msg'=>'The data is not found'
            ]);
        }
        $del = $this->exam->delete();
        if ($del) {
            $status = true;
            $msg = "Data Deleted Successfully";
        } else {
            $status = false;
             $msg = "Problem While Deleting Data";
        }
        return response()->json([
            'status'=>$status,
            'msg'=>$msg
        ]);
    }

    public function edit(Request $request){
        //dd($request->id);
        $examdata = $this->exam->findOrFail($request->id);
        return view('admin.exam')->with('examdata',$examdata);
    }
}
