@extends('layouts.backend.template')
@section('page-content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3></h3>
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



            <div class="row">
              <!--Message From Session Flash-->
              @if(Session::has('success'))
              <div class=" alert alert-success">
              	{{Session::get('success')}}
              </div>
              @endif

              @if(Session::has('error'))
              <div class=" alert alert-danger">
              	{{Session::get('error')}}
              </div>
              @endif
              <!--------------------------------->
              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
              	  
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Finalize Question</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                  	<form method="post" action="{{route('question.final.save')}}">
                  		@csrf
                      
                      <input type="hidden" value = "{{@$subject_id}}" name="subject_id">
                      
                  		
                  	<table class="table table-hover table-dark">
					  
					    
                  	@if(!empty($questions))
                    <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Question</th>
                            <th scope="col">Answer</th>
                            <th scope="col">Added By</th>
                          </tr>
                    </thead>
                    <tbody>
                  	@foreach($questions as $key=>$question)
                    	<tr>
        					      <td scope="row"><input type="checkbox" name="finalqn[]" value="{{$question->id}}"></td>
        					      <td>{{$question->question}}</td>
        					      <td>{{$question->answer}}</td>
        					      <td>{{$question->added_by}}</td>
					             </tr>
		  			         @endforeach
		  				      </tbody>
		  			     </table>
		  			<button type="cancel" class="btn btn-warning">Cancel</button>
		  			<button type="submit" class="btn btn-primary">Submit and Finalize</button>
		  			</form>
		  			@else
		  			<p >No Questions Found</p>
		  			@endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- Modal Popup For Edit Action -->
  		  <div class="modal fade " id="editmodal" role="dialog">
  		    <div class="modal-dialog bd-example-modal-lg">
  		      <div class="modal-content">
  		        <div class="modal-body" id="question-section">
                <div id="singleqn">
                      <form name="editForm">
                           <label>Question</label> 
                           <textarea class="form-control qns" placeholder="Enter Question Here" name= "question" id="qn"></textarea></br>
                           <div class="form-row options" id="options_">
                              <div class="form-group col-md-3">
                                <input type="text" class="form-control opt" placeholder="Option A" name="optA"  id="optionA" value="">
                              </div>
                              <div class="form-group col-md-3">
                                
                                <input type="text" class="form-control opt" placeholder="Option B" name="optB" id="optionB" value="">
                              </div>
                              <div class="form-group col-md-3">
                                
                                <input type="text" class="form-control opt" placeholder="Option C" name="optC"  id="optionC" value="">
                              </div>
                              <div class="form-group col-md-3">
                                 <input type="text" class="form-control opt" placeholder="Option D" name="optD" id="optionD" value="">
                              </div>
                            </div></br>

                          <input type="text" class="form-control ans" placeholder="Mention Correct Answer Or Option" name="answer" list="answer"  value="" id="ans">
                            <datalist id="answer">
                              <option>Option A</option>
                              <option>Option B</option>
                              <option>Option C</option>
                              <option>Option D</option>
                            </datalist>
                            </br><input type="checkbox"  name="is_entry" id="entryQn_"/> Mark as Entry Type</br>
                            <input type="hidden" name="question_id" id="qn_id" value="" />
                            </form>
                            </div>
  		          
               
  		        </div>
  		        <div class="modal-footer">
  		          <button type="cancel" class="btn btn-warning" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-primary" id="editForm-Submit">Submit</button>
  		          
  		        </div>
  		      </div>
  		    </div>
  		  </div>
		    <!-- Modal Popup For Edit Action -->

        <!-- Modal Popup For Delete Action -->
          <div class="modal fade" id="delmodal" role="dialog">
            <div class="modal-dialog bd-example-modal-lg">
              <div class="modal-content">
                <div class="modal-body">
                  <h3>Provide Replacement Question Before Deleting</h3>
                  <div id="singleqn">
                      
                           <label>Question</label> 
                           <textarea class="form-control qns" placeholder="Enter Question Here" name= "question" id="qn"></textarea></br>
                           <div class="form-row options" id="options_">
                              <div class="form-group col-md-3">
                                <input type="text" class="form-control opt" placeholder="Option A" name="optA"  id="optionA" value="">
                              </div>
                              <div class="form-group col-md-3">
                                
                                <input type="text" class="form-control opt" placeholder="Option B" name="optB" id="optionB" value="">
                              </div>
                              <div class="form-group col-md-3">
                                
                                <input type="text" class="form-control opt" placeholder="Option C" name="optC"  id="optionC" value="">
                              </div>
                              <div class="form-group col-md-3">
                                 <input type="text" class="form-control opt" placeholder="Option D" name="optD" id="optionD" value="">
                              </div>
                            </div></br>

                          <input type="text" class="form-control ans" placeholder="Mention Correct Answer Or Option" name="answer" list="answer"  value="" id="ans">
                            <datalist id="answer">
                              <option>Option A</option>
                              <option>Option B</option>
                              <option>Option C</option>
                              <option>Option D</option>
                            </datalist>
                            </br><input type="checkbox"  name="is_entry" id="entryQn_"/> Mark as Entry Type</br>
                            <input type="hidden" name="question_id" id="qn_id" value="" />
                            
                            </div>
                      </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-warning">Submit & Delete Previous</button>
                  
                </div>
              </div>
            </div>
          </div>
        <!-- Modal Popup For Delete Action -->
@endsection
@section('scripts')
<!--<script src="{{asset('backend/build/js/formprocess.js')}}"></script>-->
<script>
   var config = {
          routes: {
              editqn: "{{ route('question.edit')}}",
              updateqn: "{{route('question.update')}}"
          }  
      };
</script>
      
   
<script>
      $("#ajax-message").hide();
  /*For Editing Qn*/
     $(document).on("click", '#editQn', function() {
      const id = $(this).parent().find('input[name=qnid]').val();
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          url : config.routes.editqn,
          type: 'post',
          data : {"id": id}
        }).done(function(data){ 
            if(typeof(data) != "object"){
              data = jQuery.parseJSON(data);
            }
           if(data.status){ 
            let check = null;
             check = (data.question.is_entry == 1)?true:false;
             $("#qn").val(data.question.question);
             $("#optionA").val(data.question.optA);
             $("#optionB").val(data.question.optB);
             $("#optionC").val(data.question.optC);
             $("#optionD").val(data.question.optD);
             $("#optionC").val(data.question.optC);
             $("#qn_id").val(data.question.id);
             $("#ans").val(data.question.answer);
             $('#entryQn_').prop('checked', check);
             if($('#entryQn_').prop('checked')){
                $("#entryQn_").val(1);
                $("div#options_").hide();
             }else{
                if ( $("div#options_").css('display') == 'none' || $("div#options_").css("visibility") == "hidden"){
                   $("div#options_").show();
                }
               $("#entryQn_").val(0);
             }
             $('#editmodal').modal('show');  
           }else{
              alert('The requested Question Is Not Found');
           }
    
        });
        
        
     });
     /*-----*/
     /*For Deleting Qn*/
     $(document).on('click','#delQn',function(){
      const id = $(this).parent().find('input[name=qnid]').val();
      $('#delmodal').modal('show');
        

     })
     /*---------------*/
      $(document).on("click", '#entryQn_', function() {
          let div = $(this).parent().children()[3];
          if($(this).prop('checked')){
            $(this).val('1');
            $(div).hide();
          }else{
            $(this).val('0');
            $(div).show();
          }     
        
      });
    

    /*Update Form Submission*/ 
     $(document).on("click","#editForm-Submit",function(){
      /*First Check For Form Validation
      if($('#qn').val() = null){
         
      }*/

        const formdata = $("form[name='editForm']").serialize();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          url : config.routes.updateqn,
          type: 'post',
          data : formdata
        }).done(function(data){ 
            if(typeof(data) != "object"){
              data = jQuery.parseJSON(data);
            }
            $("#ajax-message").removeClass();
            $("#msg").empty();
            if(data.status == true){
              $("#ajax-message").addClass("alert alert-success alert-dismissible");
            }else{
              $("#ajax-message").addClass("alert alert-warning alert-dismissible");
            }
            $("#editmodal").modal('hide');
            $("#ajax-message").show();
            $("#msg").append(data.msg);
            if(data.status) location.reload();
            

        });

     })
     /*---------------*/

</script>

@endsection