@extends('layouts.backend.template')
@section('links')
<!-- Datatables -->
    <link href="{{asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    
@endsection
@section('page-content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tables <small>Some examples to get you started</small></h3>
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
             

              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
              	<!-- Div Included For Messages From Backend -->
              	<div class="row" id="msg">
                  <div id="formresponse"> 
                    <span id="msg-db"></span>
                  </div>
                </div>  
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Table design <small>Custom design</small></h2>
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
                    <div class="table-responsive">
                    	@if(!empty($examdata))
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Exam Title</th>
                            <th class="column-title">Start Date</th>
                            <th class="column-title">Full Marks</th>
                            <th class="column-title">Pass Marks</th>
                            <th class="column-title">Time Duration(min)</th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                        	@foreach($examdata as $key=>$exam)
                          <tr class="{{($key %2 == 0)?'even':'odd'}} pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">{{$exam->examname}}</td>
                            <td class=" ">{{$exam->date}}/{{$exam->month}}/{{$exam->year}}</td>
                            <td class=" ">{{$exam->fullmarks}}</td>
                            <td class=" ">{{$exam->passmarks}}</td>
                            <td class=" ">{{$exam->timeduration}}</td>

                            <td class="last">
                            	<a href="{{route('exam.edit', ['id' => $exam->id])}}"><button class="btn btn-primary edit-ifo"><i class="fa fa-eraser"></i></button></a>
                            	<!--<a href="{{route('exam.delete',$exam->id)}}" class="del" style="color:red" data-toggle="modal" data-target="#delmodal"><i class="fa fa-trash fa-2x"></i></a>-->
                            	<button class="btn btn-danger del-info" data-id="{{$exam->id}}"><i class="fa fa-trash"></i></button>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      @else
                      <p class="alert alert-warning">No Entries Found</p> @endif                     
                    </div>	
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- Modal Popup For Delete Action -->
        <!-- Modal -->
		  <div class="modal fade" id="delmodal" role="dialog">
		    <div class="modal-dialog modal-sm">
		      <div class="modal-content">
		        <div class="modal-body">
		          <p>Are you sure you want to delete this item?</p>
		          <input type="hidden"> 
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
		          <button type="button" class="btn btn-warning"  id="confirmdel">
		          	@csrf
		          	Ok
		      	 </button>
		        </div>
		      </div>
		    </div>
		  </div>
		<!-- Modal Popup For Delete Action -->
@endsection
@section('scripts')
 <script src="{{asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{asset('backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>    
    <script>
    	$(document).ready(function() {
		    $('table').DataTable( {
		    });
		});
    </script>
    <script>
    	// global app configuration object
	    var config = {
	        routes: {
	            delete: "{{ route('exam.delete')}}",
	            //edit: "{{route('exam.edit')}}",
	        }
	    };
    </script>
    <script src="{{asset('backend/build/js/action.js')}}"></script>   
@endsection