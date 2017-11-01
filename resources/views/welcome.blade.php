<!doctype html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Sistema de control J & D</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- dataTables --}}
    <link href="{{ asset('assets/datatables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('assets/bootstrap/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/bootstrap/css/navbar-fixed-top.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ asset('assets/bootstrap/js/ie-emulation-modes-warning.js') }}"></script>

    </head>
    <body>
 
 <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/home') }}"><strong>SISTEMA DE CONTROL J & D</strong></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active">
            <div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <li class="active"> <a href="{{ url('/home') }}">Home<span class="sr-only">(current)</span></a> </li>                
                    @else
                    <li class="active">  <a href="{{ route('login') }}" >LOGIN<span class="sr-only">(current)</span></a> </li>
                    <li class="active">  <a href="{{ url('/register') }}">REGISTRO<span class="sr-only">(current)</span></a></li> 
               
                    @endauth
                </div>
            @endif
          </div>
          </div>
             </li>
          </ul>
        </div>

       </div>
    </nav> 

 

          <!-- <script src="{{ asset('assets/jquery/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

    {{-- dataTables --}}
    <script src="{{ asset('assets/dataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/js/dataTables.bootstrap.min.js') }}"></script>

    {{-- Validator --}}
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <script src="{{ asset('assets/bootstrap/js/ie10-viewport-bug-workaround.js') }}"></script>
   -->
    </body>
</html>
