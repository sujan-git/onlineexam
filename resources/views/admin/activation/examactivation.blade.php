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
                    <div class="alert alert-success">
                  		<span>✅✅ {{ Session::get('success') }}</span>
                  	</div>
                  	@endif
                  	@if(Session::has('error'))
                  	<div class="alert alert-danger">
                  		<span>{{ Session::get('error') }}</span>
                  	</div>
                  	@endif 
                </div>  
                <div class="x_panel">

                  <div class="x_title">
                    <h2>Select The Credentials To Enable Exam</h2>
                    

                    
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                    </ul>
                    <div class="clearfix"></div>

                  </div>
                  <div class="x_content">
                    
                  	
                    <form method= 'post' action="{{route('activate.exam')}}">
                    	
                    	@csrf
                    	<div class="form-group row">
                    		<label>Examination</label>
                    		<select class="form-control" name="exam_id">
                    			@if($exam != null))
                    			<option>--Select Exam To Activate--</option>
                    			@foreach($exam as $exam)
                    			<option value="{{$exam->id}}">{{$exam->examname}}</option>
                    			@endforeach
                    			@endif
                    		</select>
                    		

                    	</div>
                    	
                    	
                    	<button type="cancel" class="btn btn-warning">Cancel</button>
                    		<button type="submit" class="btn btn-primary">Submit</button>

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
    		//$("#exam").hide();
    		$("#close").on('click', function(){
    			 $(this).parent().closest('div').hide();
    		});
    	});
    </script>
    
    
@endsection