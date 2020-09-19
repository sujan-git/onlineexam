@extends('layouts.frontend.template')
@section('content')


    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Portfolio</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="jumbotron">
      <div class="container border ">
        <div class="row">
          <div class="col-sm-4">
            <div class="panel panel-primary">
              <div class="panel-heading">Student Registration</div>
              <div class="panel-body">
                <p>You Can Start Your Registration Here</p>
                <a class="btn btn-info" href="{{route('student.register')}}">Start Now</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="panel panel-primary">
              <div class="panel-heading">Student Registration </div>
              <div class="panel-body">
                <p>You Can Start Your Registration Here</p>
                <a class="btn btn-info" href="{{route('register.status')}}">Review Registration Status</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="panel panel-primary">
              <div class="panel-heading">Score Card</div>
              <div class="panel-body">
                <p>See Your Score Card</p>
                <a class="btn btn-info" href="">Score Card</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid bg-3 text-center">
      <h3>Some of my Work</h3><br>
      <div class="row">
        <div class="col-sm-3">
          <p>Some text..</p>
          <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
          <p>Some text..</p>
          <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
          <p>Some text..</p>
          <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
          <p>Some text..</p>
          <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
      </div>
    </div><br>
    <div class="container-fluid bg-3 text-center">
      <div class="row">
        <div class="col-sm-3">
          <p>Some text..</p>
          <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
          <p>Some text..</p>
          <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
          <p>Some text..</p>
          <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
          <p>Some text..</p>
          <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
      </div>
    </div><br><br>
    
  
  
@endsection