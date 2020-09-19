@extends('layouts.backend.template')
@section('page-content')

<!-- page content -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row" >
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row" id="msg">
                  @if ($errors->any())
                    <div class="alert alert-danger" >
                      <button type="button" class="close" aria-label="Close">
                          <span aria-hidden="true" id="close">&times;</span>
                      </button>
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                    </div>
                  @endif
                  @if(Session::has('success'))
                  <div class="alert alert-danger" >
                  </div>
                  <strong><span class="alert alert-info">✅✅ {{ Session::get('success') }}</span></strong></br>
                  @endif
                  
                </div>  
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Credentials</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                    <form  method="post" action="{{route('activation.save')}}">
                    
                 		@csrf
                    <style>.error {color: red}</style>


                      <div class=" form-group row">
                      	
                        <div class="col-md-12">
	                    	<label>Attribute Name</label></br>
	                    	<input type="text"  class="form-control" name="label[0]"  value="Examination" readonly="readonly" /></br>
	                    	<label>Enable Exam</label></br>
	                    	<input type="checkbox"  class="" name="status[0]" style="zoom:1.5" id="enableExam" value="active"/></br>

	                        <div id="exam">
	                        	<label>Select Examination To Activate</label></br>
		                         <select name= "exam_id"class="form-control">
		                         	<option value="">--Select One Of The Exam To Activate In Current Session--</option> 
		                         	@if($exam)
		                         	@foreach($exam as $exam)
		                            <option value="{{$exam->id}}">{{$exam->examname}}</option>
		                            @endforeach  
		                            @endif       
		                          </select>
		                          </br><label>Select Subjects For Above Examination</label>
		                         <select name= "sub_id[]" class="form-control" multiple>
		                         	@if($subjects)
		                         	@foreach($subjects as $sub)
		                         	<option value="{{$sub->id}}">{{$sub->name}}</option>
		                         	@endforeach
		                         	@endif
		                         	      
		                          </select>
		                      </div>
                       	</div>
                       	
                        
                      </div>
                      <div class=" form-group row">
                      	
                        <div class="col-md-6">
	                    	<label>Attribute Name</label></br>
	                    	<input type="text" id="examname" class="form-control" name="label[1]" placeholder="..Online Semester Exam.." value="Registration" readonly="readonly" /></br>
	                        <label>Registration Enable</label></br>
	                         <select name= "reg" class="form-control" >
	                            <option value="active">Enable</option> 
	                            <option value="inactive">Disable</option>         
	                          </select>
                       	</div>
                       	<div class="col-md-6">
                        	<label>Attribute Name</label></br>
	                    	<input type="text" id="examname" class="form-control" name="label[2]" placeholder="..Online Semester Exam.." value="Result" readonly="readonly" /></br>
	                        <label>Result View Enable</label></br>
	                         <select name="result" class="form-control">
	                            <option value="active">Enable</option> 
	                            <option value="inactive">Disable</option>         
	                          </select>
                       	</div>
                        
                      </div>
                      <button class="btn btn-danger" type="cancel">Cancel</button>
                      <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <!-- /page content -->
@endsection
@section('scripts')
<!-- validator -->
    <script src="{{asset('backend/vendors/validator/validator-plugin.js')}}"></script>
    <script>
    	$(document).ready(function(){
    		$("#exam").hide();
    		$("#enableExam").on('click', function(){
    			 if($(this).is(':checked')){
    			 	$("#exam").show();
    			 }else{
    			 	$("#exam").hide();
    			 }
    		});
    	});
    </script>
    
    
@endsection