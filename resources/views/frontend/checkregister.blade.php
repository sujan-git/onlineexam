@extends('layouts.frontend.template')

@section('content')

  <div class="panel panel-info">
    <div class="panel-heading">Student Registration Status</div>
    <div class="panel-body">
      <div class="row">
        @if(isset($error) && !$error->isEmpty())
          <div class="{{(isset($error)?'alert alert-danger':'')}}">
            <p>ERROR!</p>
          <ul>
            
            <li>{{$error}}</li>
            
          </ul>
          </div>
        @endif
        <div class="col-md-12">
          <form name="register-form" method="post" action="{{route('register.status')}}" enctype="multipart/form-data">
            @csrf
            <label for="fistname">Enter Your Token<sup>*</sup></label>
            <p>
            <div class="form-group row">  
              <div class="form-group col-md-4">
                <input type="text" name="search_id[0]" class="form-control"  placeholder="shankar">
              </div>
         
              <div class="form-group col-md-4">
               
                <input type="text" name="search_id[1]" class="form-control"  placeholder="08">
              </div>
              
              <div class="form-group col-md-4">
                
                <input type="text" name="search_id[2]" class="form-control"  placeholder="758">
              </div>    
            </div>
          </p>

            


            <div class="form-group row">
              <button type="cancel" class="btn btn-danger">Cancel</button>
              <button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
            </div>

            </form>
          </div>


      </div>
    </div>
  </div>


@endsection
@section('scripts')

<script src="{{asset('backend/vendors/validator/validator-plugin.js')}}"></script>
<script src="{{asset('js/register.js')}}"></script>

@endsection
