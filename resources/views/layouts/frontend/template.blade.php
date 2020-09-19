<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	

    <title>{{(isset($title)?$title:'Online examination Portal!')}}</title>

    <!-- Bootstrap -->
    <link href="{{asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('backend/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/header.css')}}"  rel="stylesheet">
    <link href="{{asset('css/index.css')}}"  rel="stylesheet">
    @yield('styles')

    
</head>
<body>
    <div class="container">
      <div id="header">
            <a href="{{route('home')}}">
              <img src="{{asset('images/logo.png')}}" alt="" style="height:110px" class="logo" />
            </a>
        <div id="logo_text">
          <h3>
          Open University
          </h3>
          <h3>
          Exam Control Board
          </h3>
          <h3>
          Kathmandu , Nepal
          </h3>
        </div>
        <ul id="toplinks"></ul>
      </div>
	   @yield('content')
       <footer class="container-fluid text-center">
            <p>Powered By:Online Exam Board</p>
       </footer>
    </div>
</body>
<!-- jQuery -->
    <script src="{{asset('backend/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('backend/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>
  @yield('scripts')
    </html>