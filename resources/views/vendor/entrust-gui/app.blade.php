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
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
     <link rel="stylesheet" href="{{asset('css/app.css')}}">
    
</head>
<body>
<div id="app">
           <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
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


<div class="container-fluid">
      <div class="row">   
      <div class="col-md-12">
      <h1>@yield('heading')</h1>
        @include('entrust-gui::partials.notifications')
      </div>
      </div>
      </div>

 <div class="row">
    <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Escritorio</div><!-- Escritorio-->
                   <div class="panel-body">   
<div class="row"><!--Menú de navegación-->                   
<div class="div1 col-md-2 " >
      <ul class="nav nav-pills nav-stacked">
        <li class="dropdown">
        <a class="list-group-item" data-toggle="dropdown" href="#"><i class="fa fa-list-ul" aria-hidden="true"></i>&nbsp;Administración</a>
      <ul class="dropdown-menu">
        <li><a class="{{ (Request::is('*users*') ? 'active' : '') }}"></a> </li>
        <li><a href="{{ route('entrust-gui::users.index') }}" class="list-group-item "><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Usuarios</a> </li>
        <li><a href="{{ route('entrust-gui::roles.index') }}" class="list-group-item "><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Roles</a> </li>
        <li><a href="{{ route('entrust-gui::permissions.index') }} "class="list-group-item "><i class="fa fa-hand-paper-o" aria-hidden="true"></i>&nbsp;Permisos</a></li>               
      </ul>
         </li>
         <li><a href="{{route('compra.index')}}" class="list-group-item"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;Compras</a></li>
         <li><a href="{{route('articulo.index')}}" class="list-group-item"><i class="fa fa-medkit" aria-hidden="true"></i>&nbsp; Articulos</a></li>
         <li><a href="{{route('venta.index')}}" class="list-group-item"><i class="fa fa-shopping-bag" aria-hidden="true"></i>&nbsp;Ventas</a></li>
         <li><a href="{{route('proveedor.index')}}" class="list-group-item"><i class="fa fa-id-card-o " aria-hidden="true"></i>&nbsp;Proveedores</a></li>
         <li><a href="{{route('cliente.index')}}" class="list-group-item "><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Clientes</a></li>
         <li><a href="{{route('caja.index')}}" class="list-group-item"><i class="fa fa-money" aria-hidden="true"></i>&nbsp;Caja</a></li>    
      
       </ul>
</div> 
<div class="col-md-10">   
    <br>
    @yield('content')<!-- Espación para contenido-->
   </div> 
</div> 
</div> 
</div> 
</div> 
</div> 
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
     <script src="{{ asset('js/documento.js') }}"></script>
         <!-- <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script> -->

</body>
</html>