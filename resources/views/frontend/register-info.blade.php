@extends('layouts/frontend.template')
@section('content')

<div class="panel panel-light">
    <div class="panel-heading"><h2><b>Student Registration Information</b></h2></div>
	    <div class="panel-body">
	    	</br>
	      <div class="row">
	      	
	      	@if(Session::has('success'))
	      	<strong><span class="alert alert-info">✅✅ {{ Session::get('success') }}</span></strong></br></br>
	      	@endif
	      	
	      	@if(Session::has('error'))
	      	<span class="alert alert-danger">❌❌ {{Session::get('error') }}</span></br></br>
	      	@endif
	      	@if(Session::has('token'))
	      	</br></br><strong><span class="alert alert-primary">Use This Token To Review Registration Status:<strong style="color:red; font-size:25px">{{Session::get('token')}}</strong></span></br></br>
	      	@else
	      	<span class="alert alert-secondary">No Particular Information Available At This Moment</span>
	      	@endif
	      	<a href="{{route('register.status')}}" class="btn btn-info">Click Here To See Registration Status</a>
	      </div>
	     </div>
	 </div>
  </div>
@endsection