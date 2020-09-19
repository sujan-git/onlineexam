@extends('layouts.backend.template')
@section('page-content')
@php
                                    $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December',null);
                                   @endphp
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
                    @if(isset($examdata))
                    <form id="update-form" name="examdata" method="post" action="{{route('exam.update',['id'=> $examdata->id])}}">
                    @csrf
                      
                        @if($examdata)
                                   <?php
                                     $month = (int)$examdata->month;
                                   ?>
                        @endif
                    @else
                   <form id="demo-form" name="examdata" method="post" action="{{route('exam.post')}}">
                    @csrf
                    @endif
                    <style>.error {color: red}</style>
                      <label for="examname">Examination Title * :</label>
                      <input type="text" id="examname" class="form-control" name="examname" placeholder="..Online Semester Exam.." value="{{@(isset($examdata))?$examdata->examname:''}}"/></br>

                      <label>Date Of Examination * :</label></br>
                      <div class="row">
                        <div class="col-sm-3">
                         <select name= "month"class="form-control" id="month">
                                  
                                   <option value="">--Select Month--</option>
                                    @for($i= 0 ;$i<= 11; $i++)
                                    <option value="{{$i+1}}" {{(@$examdata->month == $i+1)?'selected':''}}>{{$months[$i]}}</option>
                                   @endfor
                                   
                                  </select>
                       </div>
                       <div class="col-sm-3">
                         <select name= "date" class="form-control" >
                                  
                                  
                                    <option value="">--Select Date--</option>
                                   
                                   
                                    @for($i= 1 ;$i<= 32; $i++)
                                    <option value="{{$i}}" {{(@$examdata->date == $i)?'selected':''}}>{{$i}}</option>
                                   @endfor
                                  </select>
                       </div>
                       <div class="col-sm-3">
                         <select name= "year"class="form-control">
                                  
                                  
                                    <option value="">--Select year--</option>
                                   
                                   
                                    @for($i=2000 ;$i<= 2050; $i++)
                                    <option value="{{$i}}" {{@($examdata->year == $i)?'selected':''}}>{{$i}}</option>
                                   @endfor
                                  </select>
                       </div> 
                      </div></br>
                          
                                

                      <label for="">Time Duration (in min)* :</label>
                      <input type="number"  class="form-control" name="timeduration" value="{{@(isset($examdata))?$examdata->timeduration:''}}"/></br>

                      <label for="">Full Marks * :</label>
                      <input type="number"  class="form-control" id="fm" name="fullmarks"  value="{{@(isset($examdata))?$examdata->fullmarks:''}}"/></br>

                      <label for="">Pass Marks * :</label>
                      <input type="number"  class="form-control" name="passmarks" value="{{@(isset($examdata))?$examdata->passmarks:''}}"/> 
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
<!-- validator -->
    <script src="{{asset('backend/vendors/validator/validator-plugin.js')}}"></script>
    <script src="{{asset('backend/build/js/examformvalidation.js')}}"></script>
    <script src="{{asset('backend/build/js/exam-ajax.js')}}"></script>
    <script>
      var config = {
          routes: {
              list: "{{ route('exam.list')}}",
              //edit: "{{route('exam.edit')}}",
          }
      };
    </script>
    <script>
      $('#close').on('click',function(){

         $('#msg').empty();
      });
      $(".cancel").click(function() {
         var validate = $("form[name='examdata']").validate({
        });
         validate.resetForm();
        
      });
    </script>
@endsection