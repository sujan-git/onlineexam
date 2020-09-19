<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class Question extends Model
{
    protected $fillable = ['question','optA','optB','optC','optD','answer','added_by','subject_id','is_entry'];

    public function getQuestionBySubject($id){
    	/*return $this->where('added_by',Auth::user()->id)->where('subject_id',$id)
    		->get();*/	
    	return   $this->where([
    			['added_by', '=', Auth::user()->id],
    			['subject_id', '=', $id],
				])->get();	
    		
    }



    public function getFinalQuestionForExam($exm_id,$sub_id){
       // dd($sub_id);
       return DB::table('questions')
       ->join('relations','relations.question_id','=','questions.id')
        ->where('exam_id','=',$exm_id)
        ->where('sub_id','=',$sub_id)
        ->get();
       //->toSql(); 
    }
}
