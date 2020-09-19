<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	

    <title>{{(isset($title)?$title:'My Exam')}}</title>

    <!-- Bootstrap -->
    <link href="{{asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('backend/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/examsetup.css')}}"  rel="stylesheet">
    
    

    
</head>
<body>
   <div class="container">
   	<div class="panel panel-info" style="border: 0;box-shadow: none;">
    	<div class="panel-heading">Student Registration Form</div>
    	<div class="panel-body" >
      		<div class="row">
        		<div class="col-md-12 xs-12 sm-12">
          			<form id="msform">
          				@if($chemistry)
                       		    
                       	<fieldset>
                       		<h3>Chemistry</h3>
                       		@foreach($chemistry as $key=>$question)
                       		<div class="form-group row">
                       			<label style="font-size:20px">{{$key+1}}.{{$question->question}}</label>
                       			@if($question->is_entry == 1)
                       			<input type="text" class="form-control form-control-lg" placeholder="No Options Available. You can provide your own answer"/>
                       			@else
                       				
                       				<p class="options">
	                       			<input type="radio" name="answer"/>{{$question->optA}}</p>
	                       			<p class="options"><input type="radio" name="answer"/>{{$question->optB}}</p>

	                       			<p class="options"><input type="radio" name="answer"/>{{$question->optC}}
	                       			</p>
	                       			<p class="options"><input type="radio" name="answer"/>{{$question->optD}}
	                       			</p>
	                       		
                       			@endif
                       		</div>
                       		@endforeach
                       		<input type="button" name="next" class="next action-button btn btn-info" value="Go To Next Page" />     
                        </fieldset> 
                        @endif 

                         	<fieldset>
                         		<h3>Physics</h3>
                       		@foreach($chemistry as $key=>$question)
                       		<div class="form-group row">
                       			<label style="font-size:20px">{{$key+1}}.{{$question->question}}</label>
                       			@if($question->is_entry == 1)
                       			<input type="text" class="form-control form-control-lg" placeholder="No Options Available. You can provide your own answer"/>
                       			@else
                       				
                       				<p class="options">
	                       			<input type="radio" name="answer"/>{{$question->optA}}</p>
	                       			<p class="options"><input type="radio" name="answer"/>{{$question->optB}}</p>

	                       			<p class="options"><input type="radio" name="answer"/>{{$question->optC}}
	                       			</p>
	                       			<p class="options"><input type="radio" name="answer"/>{{$question->optD}}
	                       			</p>
	                       		
                       			@endif
                       		</div>
                       		@endforeach
                       		<input type="button" name="previous" class="previous btn btn-warning" value="Go To Previous Page" />
                       		<input type="button" name="next" class="next action-button btn btn-info" value="Go To Next Page" />     
                        </fieldset>     
                    </form>
          		</div>
      		</div>
    	</div>
  	</div> 	
   </div>
</body>
<!-- jQuery -->
    <script src="{{asset('backend/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('backend/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  	<script src="{{asset('js/examsetup.js')}}"></script>
    </html>