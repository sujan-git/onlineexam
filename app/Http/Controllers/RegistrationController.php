<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Registration;
use Validator;
use File;

class RegistrationController extends Controller
{
    public function __construct(Registration $register){
    	$this->register = $register;
    }
    /*-----------Backend Functions For Admin-----------*/
    public function index(){
        $all_registration = $this->register->get();

        return view('admin.registration.list')->with('registration',$all_registration);
    }

    public function verify(Request $request){
        if($request->id){
            $this->register = $this->register->find($request->id);
            if(!$this->register){
                return response()->json(['status'=>false,'msg'=>'The Data Was Not Found']);
            }
            $data['status'] = 'verified';
            $data['symbol_no'] = date('Y').'-'.$this->register->id;
            $this->register->fill($data);
            $succ = $this->register->save();
            if($succ){
                return response()->json(['status'=>true,'msg'=>'Verified Succesfully']);
            }else{
                return response()->json(['status'=>false,'msg'=>'Unable To Verify']);
            }
        }else{
            return response()->json(['status'=>false,'msg'=>'Your request was invalid']);
        }
        
    }

    public function checkDetails(Request $request){
        $register_info = $this->register->findOrFail($request->id);
        return view('frontend.register-status')->with('info',$register_info);

    }
    /*-----------Backend Functions For Admin-----------*/

    public function create(){
    	return view('frontend.register');
    }

    public function edit(Request $request){
        if($request->method() != 'POST'){
            return redirect()->route('home');
        }

        if($request->token){
            $info =  $this->register->where('search_id',$request->token)->first();
            if($info == NULL){
                abort(404);
            }
            return view('frontend.register')->with('info',$info);
        }else{
            return 'ERROR ! In Request';
        }
    }

    public function info(){return view('frontend.register-info');}

    public function add(Request $request){

    	//dd($request);
    	$validate = Validator::make($request->all(),$this->register->getRules());
    	if($validate->fails()){
            $errors =  $validate->messages();
            return redirect()->back()->with('errors',$errors);
        }
        $act = "add";

        if (isset($request->token)) {
            $act = "update";
            //$rules['image'] = 'sometimes|image|max:5000';
            $this->register = $this->register->where('search_id',$request->token)->first();
            if($this->register == null){
                abort(404);
            }
        }

        //$request->validate($rules);

        $data = $request->except(['_token']);
        /*-----Generate Search Id------*/
        	$data['search_id'] = strtolower($request->fname) .'-' . date("s"). '-'.rand(0,999);
        	
        /*-----Generate Search Id------*/
        /* ---Save Student Image-----*/
	        $path_std = public_path() . "/uploads/studentimage";
	        if (!File::exists($path_std)) {
	            File::makeDirectory($path_std, 0777, true, true);
	        }
	        if ($request->profile) {
	            $file_name = "profile-" . date('Ymdhis') . rand(0, 999) . "." . $request->profile->getClientOriginalExtension();
	            $success = $request->profile->move($path_std, $file_name);

	            if ($success) {
	                if (isset($this->register->profile) && !empty($this->register->profile) && file_exists(public_path() . '/uploads/studentimage/' . $this->register->profile)) {
	                    unlink(public_path() . '/uploads/studentimage/' . $this->register->profile);
	                }

	                $data['profile'] = $file_name;
	            }
	        }
        /* ---Save Student Image-----*/

        /* ---Save Verification Documnet-----*/

	        $path_doc = public_path() . "/uploads/verificationdocument";
	        if (!File::exists($path_doc)) {
	            File::makeDirectory($path_doc, 0777, true, true);
	        }
	        if ($request->verify_document) {
	            $file_name = "document-" . date('Ymdhis') . rand(0, 999) . "." . $request->verify_document->getClientOriginalExtension();
	            $success = $request->verify_document->move($path_doc, $file_name);
	            if ($success) {
	                if (isset($this->register->verify_document) && !empty($this->register->verify_document) && file_exists(public_path() . '/uploads/verificationdocument/' . $this->register->verify_document)) {
	                    unlink(public_path() . '/uploads/verificationdocument/' . $this->register->verify_document);
	                }
	                $data['verify_document'] = $file_name;
	            }
	        }
        /* ---Save Verification Documnet-----*/
       
        $this->register->fill($data);
        $success = $this->register->save();
        if ($success) {
        	$request->session()->flash('token',$data['search_id']);
            $request->session()->flash('success', 'Information Registration Sucessful');
        } else {
            $request->session()->flash('error', 'Sorry! There was problem while registration');
        }

        return redirect()->route('register.info');
       
    }

    public function status(Request $request){
    	return view('frontend.checkregister');
    	
    }

    public function checkStatus(Request $request){

    	if($request->search_id[0] && $request->search_id[0] && $request->search_id[2]){
    		$search_id = $request->search_id[0].'-'.$request->search_id[1].'-'.$request->search_id[2];
    		$register_info = $this->register->where('search_id',$search_id)->first();
    		if($register_info == null){
    			return redirect()->back()->with('error','Your Information Was Not Found');
    		}

    		return view('frontend.register-status')->with('info',$register_info);
    	}else{
    		return 'ERROR! In Request';
    	}
    }
}
