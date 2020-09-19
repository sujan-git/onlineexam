@extends('layouts.frontend.template')

@section('content')

  <div class="panel panel-info">
    <div class="panel-heading">Student Registration Information</div>
    <div class="panel-body">
      <div class="row">
        @if(!$errors->isEmpty())
          <div class="{{(isset($errors)?'alert alert-danger':'')}}">
            <p>ERROR!</p>
          <ul>
            @foreach($errors->all() as $key=>$error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
          </div>
        @endif
        <div class="col-md-12">
          <form method="post" action="{{route('register.edit')}}">
            @csrf
            <input type="hidden" name="token" value="{{$info->search_id}}">
          <button class="btn btn-warning" type="submit">Edit My Registration</button>
          </form>
           
          <div class="row">
            <p><em>Note:This is Not Admit Card. You Will Be Able To Receive Admit Card Once Your Status is Verified</em></p>
            <div class="col-md-4">
              <table class="table table-sm">              
                  <tbody>
                    <tr>
                      <td>Applicant Name</td>
                       <td>{{$info->fname}} {{$info->midname}} {{$info->lname}}</td>
                       
                    </tr>
                    <tr>
                      <td>Token Id</td>
                      <td>{{$info->search_id}}</td>
                    </tr>
                     <tr>
                      <td>Date Of Birth</td>
                      <td>{{$info->dob}}</td>
                    </tr> 
                    <tr>
                      <td>Gender</td>
                      
                        @if($info->gender == 'm')
                        <td>Male</td>
                        @elseif($info->gender == 'f')
                        <td>Female</td>
                        @else
                         <td>Other</td>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>{{$info->email}}</td>
                    </tr>
                    <tr>
                      <td>Phone</td>
                      <td>{{$info->phone}}</td>
                    </tr>
                    <tr>
                      <td>Father Name</td>
                      <td>{{$info->fathername}}</td>
                    </tr>
                    <tr>
                      <td>Mother Name</td>
                      <td>{{$info->mothername}}</td>
                    </tr>
                    <tr>
                      <td>Address</td>
                      <td>{{$info->address}}</td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      @if($info->status == NULL)
                      <td style="color:red">Waiting To Be Verified
                      </td>
                      @elseif($info->status == 'verified')
                      <td>
                        <a href="" target="_">Download My Admit Card</a>
                      </td>
                      @endif
                    </tr>
                   
                  </tbody>

              </table>
            </div>
            <div class="col-md-4">
              <div class="row">
              @if(file_exists(public_path().'/uploads/studentimage/'. $info->profile)) 
                  <a href="{{asset('uploads/studentimage/'.$info->profile)}}"><img src="{{asset('uploads/studentimage/'.$info->profile)}}" class="img img-thumbnail" style="height:150px"></a>
              @endif
              </div>
              <div class="row">
              @if(file_exists(public_path().'/uploads/verificationdocument/'. $info->verify_document)) 
                  <a href="{{asset('uploads/verificationdocument/'.$info->verify_document)}}"><img src="{{asset('uploads/verificationdocument/'.$info->verify_document)}}" class="img img-thumbnail" style="height:150px"></a>
              @endif
              <p> Verification Document</p>
              </div>
            </div>
          </div>
          <a class="btn btn-primary" href="{{route('home')}}">Go To Homepage</a>
        </div>
      </div>
    </div>
  </div>


@endsection
@section('scripts')

<script src="{{asset('backend/vendors/validator/validator-plugin.js')}}"></script>
<script src="{{asset('js/register.js')}}"></script>

@endsection
