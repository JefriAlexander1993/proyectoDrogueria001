<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistema de Control J & D') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
</head>
<body>
<div id="app">
           <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <strong>SISTEMA DE CONTROL<string>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            
                                               @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
</div>
<div>
<div class="container">
      <div class="row">
      <div class="col-sm-12">
        <h1>@yield('heading')</h1>
        @include('entrust-gui::partials.notifications')
      </div>
    </div>
  </div>
    <div class="row">
        <div class="col-sm-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Escritorio</div>
                <div class="row">
<div class="col-sm-2">
<div class="list-group">
    <a href="{{route('producto.index')}}" class="list-group-item">Productos</a>
    <a href="{{route('venta.index')}}" class="list-group-item">Ventas</a>
    <a href="{{route('proveedor.index')}}" class="list-group-item">Proveedores</a>
    <a href="{{route('cliente.index')}}" class="list-group-item ">Clientes</a>
    <a href="#" class="list-group-item">Caja</a>      
    <a class="{{ (Request::is('*users*') ? 'active' : '') }}">
    <a href="{{ route('entrust-gui::users.index') }}" class="list-group-item "><i class=" m-r-10" aria-hidden="true"></i>Usuarios</a>
    <a href="{{ route('entrust-gui::roles.index') }}" class="list-group-item "><i class=" m-r-10" aria-hidden="true"></i>Roles</a>
    <a href="{{ route('entrust-gui::permissions.index') }} "class="list-group-item "><i class=" m-r-10" aria-hidden="true"></i>Permisos</a>
     
</div>                    
</div>

<div class="col-sm-9">
      
   <br>
    @yield('content')
</div>
</div>
         
<div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                                  </div>
    </div>

</div>
</div>
     <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
