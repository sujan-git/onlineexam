@extends('layouts.frontend.template')

@section('content')

  <div class="panel panel-info">
    <div class="panel-heading">Student Registration Form</div>
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
          @if(isset($info))
          <form name="register-form" method="post" action="{{route('register.update')}}" enctype="multipart/form-data">
            @csrf
          @else
          <form name="register-form" method="post" action="{{route('register.add')}}" enctype="multipart/form-data">
            @csrf
            @endif
            <div class="form-group row">
              <div class="form-group col-md-4">
                <label for="fistname">First Name<sup>*</sup></label>
                <input type="text" name="fname" class="form-control" id="firstname" placeholder="Fist Name" value="{{@($info->fname)}}">
              </div>
              <div class="form-group col-md-4">
                <label for="middlename">Middle Name</label>
                <input type="text" name="midname" class="form-control" id="middlename" placeholder="Middle Name" value="{{@($info->midname)}}">
              </div>
              <div class="form-group col-md-4">
                <label for="lastname">Last Name<sup>*</sup></label>
                <input type="text" name="lname" class="form-control" id="lastname" placeholder="Last Name" value="{{@($info->lname)}}">
              </div>
            </div>

            <div class="form-group row">
              <div class="form-group col-md-4">
                <label for="fathername">Father Name<sup>*</sup></label>
                <input type="text" name="fathername" class="form-control" id="fathername" placeholder="Father Name" value="{{@($info->fathername)}}">
              </div>
              <div class="form-group col-md-4">
                <label for="mothername">Mother Name<sup>*</sup></label>
                <input type="text" name="mothername" class="form-control" id="mothername" placeholder="Mother Name" value="{{@($info->mothername)}}">
              </div>
              <div class="form-group col-md-4">
                <label for="address">Address<sup>*</sup></label>
                <input type="text" name="address" class="form-control" id="address" placeholder="Permanent Address" value="{{@($info->address)}}">
              </div>
            </div>

            <div class="form-group row">
              <div class="form-group col-md-6">
                <label for="dob">Date oF Birth<sup>*</sup></label>
                <small>(Please Provide Date of Birth in AD)</small>
                <input type="date" name="dob" class="form-control" id="dob" placeholder="" value="{{@($info->dob)}}">
              </div>

              <div class="form-group col-md-6">
                <label for="email">Email<sup>*</sup></label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{@($info->email)}}">
              </div>

            </div>

            <div class="form-group row">
              <div class="form-group col-md-6">
                <label>Gender <sup>*</sup></label>
                      <p>
                        Male:
                        <input type="radio" class="flat" name="gender" id="genderM" value="m"  {{@($info->gender == 'm')?'checked':''}}/> Female:
                        <input type="radio" class="flat" name="gender" id="genderF" value="f" {{@($info->gender == 'f')?'checked':''}}/>
                        Other:
                        <input type="radio" class="flat" name="gender" id="other" value="o" {{@($info->gender == 'o')?'checked':''}}/>
                      </p>

              </div>
              <div class="form-group col-md-6">
                <label for="phnumber">Phone Number<sup>*</sup></label>
                <input type="tel" name="phone" class="form-control" id="phnumber" placeholder="Phone Number" value="{{@($info->phone)}}">
              </div>
            </div>

            <div class="form-group row">

              <div class="form-group col-md-6">
                <label for="photo">Student Photo<sup>*</sup></label>
                <input type="file" name="profile"  id="photo" name="profile">
                <small>Maximum permitted dimension is 400*400 px and size of 1 MB</small>
                @if(isset($info))
                <p class="alert alert-info">Chosing New Image Will Discard Previous One</p>
                @endif
              </div>
              <div class="form-group col-md-6">
                <label for="vdoc">Verification Document<sup>*</sup></label>
                <input type="file" name="verify_document"  id="vdoc" name="verify_document">

                <small>Provide Verification Document Like Citizenship or Id Card [Permitted Max Size: 750*1000px, Maximum Size:1 MB]</small>
                @if(isset($info))
                <p class="alert alert-info">Chosing New Image Will Discard Previous One</p>
                @endif
              </div>
            </div>
           
             <div class="form-group row" id="image_preview">
              
              <div class="form-group col-md-6">
                @if(file_exists(public_path().'/uploads/studentimage/'. $info->profile)) 
                  <img src="{{asset('uploads/studentimage/'.$info->profile)}}" class="img img-thumbnail" id="profile_image">
                @endif

                
              </div>
              <div class="form-group col-md-6">
                @if(file_exists(public_path().'/uploads/verificationdocument/'. $info->verify_document)) 
                  <img src="{{asset('uploads/verificationdocument/'.$info->verify_document)}}" class="img img-thumbnail" id="document">
              @endif

              </div>
            </div>
            @if(isset($info))
            <input type="hidden" name="token" value="{{@($info->search_id)}}">
            @endif

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
