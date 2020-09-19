@extends('layouts.backend.template')
@section('page-content')
<!-- page content -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><a href="{{route('exam.list')}}"><button class="btn btn-primary">View All Exam Entries</button></a></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
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
                  <div id="formresponse">
                    <span id="msg-db"></span>
                  </div>
                </div>  
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Exam Credentials</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                   <form  id="questionForm"method="post" action="{{route('question.post')}}" enctype/multipart>
                    @csrf
                    
                    <style>.error {color: red}</style>
                    <label>Chose Relevent Subject</label>
                    <select name="subject_id" class="form-control">
                       <option>--Select Subject Of this Question Setup--</option>
                      @if($subj)
                      @foreach($subj as $subj)
                        <option value="{{$subj->id}}">{{$subj->name}}</option>
                      @endforeach
                      @endif
                    </select>
                    
                    <div id= "question">
                    	<div id="singleqn">
		                     <label>Question</label> 
		                     <textarea class="form-control qns" placeholder="Enter Question Here" name= "question[]"></textarea></br>
		                     <div class="form-row options" id="options">
          		    					<div class="form-group col-md-3">
          							      
          							      <input type="text" class="form-control" placeholder="Option A" name="optA[]">
          		    					</div>
          							    <div class="form-group col-md-3">
          							      
          							      <input type="text" class="form-control" placeholder="Option B" name="optB[]">
          							    </div>
          							    <div class="form-group col-md-3">
          							      
          							      <input type="text" class="form-control" placeholder="Option C" name="optC[]">
          							    </div>
          							    <div class="form-group col-md-3">
          							       <input type="text" class="form-control" placeholder="Option D" name="optD[]">
          							    </div>
                          </div></br>
                          <input type="text" class="form-control ans" placeholder="Mention Correct Answer Or Option" name="answer[]" list="answer">
                          <datalist id="answer">
                            <option>Option A</option>
                            <option>Option B</option>
                            <option>Option C</option>
                            <option>Option D</option>
                          </datalist>
                          </br><input type="checkbox" name="is_entry[]"  id="entryQn"/> Mark as Entry Type</br>
                          <button type="button" class="btn btn-info" id="addmore">Add More Question</button>
		  					      </div>
	  					      </div>
                      </br><button class="btn btn-warning cancel" type="reset" >Reset</button>
                      <button class="btn btn-primary" type="submit" id="submitform">Submit</button>
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
<script src="{{asset('backend/vendors/validator/validator-plugin.js')}}"></script>
<script src="{{asset('backend/build/js/question-dynamic.js')}}"></script>
<script src="{{asset('backend/build/js/formprocess.js')}}"></script>
@endsection