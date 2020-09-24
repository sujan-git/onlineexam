@extends('layouts.frontend.template')
@section('content')
<style>


</style>
<div id="login">
        <h3 class="text-center text-white pt-5">Provide Symbol No and Token ID</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
            	@if(Session::has('error'))
            	<div class="alert alert-danger">
            		<span>{{Session::get('error')}}</span>
            	</div>
            	@endif
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{route('stdnt.login')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="token_id" class="text-info">Token Id</label><br>
                                <input type="text" name="search_id" id="token_id" class="form-control" placeholder="provide complete token id without missing any symbol and digits">
                            </div>
                            <div class="form-group">
                                <label for="roll_no" class="text-info">Exam Roll No</label><br>
                                <input type="text" name="symbol_no" id="roll_no" class="form-control" placeholder="provide complete symbol no without missing any symbol and digits">
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button class="btn btn-warning" type="cancel">Cancel</button>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection