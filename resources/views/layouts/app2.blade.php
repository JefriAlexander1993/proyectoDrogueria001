<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Jm | Programming</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminLte/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('adminLte/css/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminLte/css/adminLte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">

    <!-- /.login-box -->
    @yield('content')
    <!-- jQuery -->
    <script src="{{asset('adminLte/js/jquery.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('adminLte/js/bootstrap.bundle.min.js')}}"></script>
    <!-- adminLte App -->
    <script src="{{asset('adminLte/js/adminLte.min.js')}}"></script>

</body>
<footer class="footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 2.0
    </div>
    <strong>2015-2020<a href="http://adminlte.io">JM PROGRAMMING</a>.</strong> 
</footer>

</html>

