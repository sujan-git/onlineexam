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
                    <h2>Credentials</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  @if(Session::has('success'))
                  <strong><span class="alert alert-info">✅✅ {{ Session::get('success') }}</span></strong></br>
                  @endif
                  <div class="x_content">
                    <br />
                    @if(!empty($activeexam))
                    <table class="table table-hover">
					  <thead>
					    <tr>  
					      <th scope="col">Examination</th>
					      <th scope="col">Status</th>
					      <th scope="col">Actions</th>
					    </tr>
					  </thead>
					  <tbody>
					  	
					    <tr>
					    
					      <td>{{ucfirst($activeexam->examname)}}</td>
					      <td>{{ucfirst($activeexam->status)}}</td>
					      <td>
					      	<a class="btn btn-warning" href="{{route('deactivateexam',$activeexam->id)}}">DeActivate</a></td>
					    </tr>
					    
					  </tbody>
					</table>
					@else
					<p>Parameter In Database Is Empty</p>
					@endif
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