<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jm | Programming</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->

    <link rel="stylesheet" href="{{asset('adminLte/css/all.min.css')}}">
    <!-- Ionicons -->
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('adminLte/css/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminLte/css/datatable/responsive.bootstrap4.min.css')}}">
    <!-- Theme style -->

    <link rel="stylesheet" href="{{ asset('adminLte/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminLte/css/adminLte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}">
    


</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
      
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        {{ auth()->user()->name_user }}

                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">Opciones</span>
                        <div class="dropdown-divider"></div>

                        <a class="nav-link text-center" href="{{ route('perfil.show',auth()->user()->id) }}">
                            <i class="nav-icon fas fa-user"></i> Perfil
    
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-power-off"></i> Cerrar session
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        {{-- <a href="#" class="dropdown-item dropdown-footer"></a> --}}
                    </div>

                </li>


            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img class="brand-image img-circle elevation-3" src="{{asset('assets/img/logo.png')}}" alt="" data-src="/ic/logo.png" alt="">
                {{-- <img src="" alt="adminLte Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
                <span class="brand-text font-weight-light">Jm Programming</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        {{-- <img src="" class="img-circle elevation-2" alt="User Image"> --}}
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name_user }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link active">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Dashboard

                                </p>
                            </a>
                        </li>
                        @role('admin')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Administración
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('user.index')}}" class="nav-link">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            Usuarios
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('role.index')}}" class="nav-link">
                                        <i class="nav-icon far fa-registered"></i>

                                        <p>Roles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('permission.index')}}" class="nav-link"><i class="nav-icon fas fa-user-tag"></i>

                                        <p>Permisos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('permission_role.index')}}" class="nav-link"><i class="nav-icon fas fa-user-lock"></i>

                                        <p>Asignacion de permisos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('role_user.index')}}" class="nav-link"><i class="nav-icon fas fa-tags"></i>

                                        <p>Asignacion de roles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('backup.segurity')}}" class="nav-link">
                                        <i class="nav-icon fas fa-clone"></i>
                                        <p>
                                            Copia de seguridad
        
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endrole
                        <li class="nav-item">
                            <a href="{{route('inventario.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-boxes "></i>
                                <p>
                                    Inventario

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('abono.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-money-bill-alt"></i>
                                <p>
                                    Abonos

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('articulo.index')}}" class="nav-link">
                                <i class="nav-icon fab fa-product-hunt"></i>

                                <p>
                                    Articulos

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('compra.index')}}">
                                <i class="nav-icon fas fa-store"></i>
                                <p>
                                    Compras

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('cliente.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    Clientes

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('credito.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    Creditos

                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('proveedor.index')}}" class="nav-link"><i class="nav-icon fas fa-users"></i>

                                <p>
                                    Proveedores

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('venta.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Ventas

                                </p>
                            </a>
                        </li>





                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item"><a href="{{ url(Request::path()) }}">{{ ucfirst(Request::path())}}</a></li>

                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            @include('message.message')
                            <div class="card">
                                <div class="card-header">

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>

                                <div class="card-body">

                                    @yield('content')
                                </div>

                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        {{-- <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 216-2020 <a href="#">Jm Programming</a>.</strong> All rights
            reserved.
        </footer> --}}

        <!-- Control Sidebar -->
        {{-- <aside class="control-sidebar control-sidebar-dark"> --}}
        <!-- Control sidebar content goes here -->
        {{-- </aside> --}}
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->

    <script src="{{asset('adminLte/js/jquery.min.js')}}"></script>

    <script src="{{asset('adminLte/js/jquery.overlayScrollbars.min.js')}}"></script>

    <script src="{{asset('adminLte/js/datatable/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset('adminLte/js/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('adminLte/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminLte/js/datatable/responsive.bootstrap4.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('adminLte/js/bootstrap.bundle.min.js')}}"></script>

    <!-- adminLte App -->
    <script src="{{asset('adminLte/js/adminLte.min.js')}}"></script>
    <!-- adminLte for demo purposes -->
    <script src="{{asset('adminLte/js/demo.js')}}"></script>

    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script src="{{ asset('js/documento.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js')}}"></script>
    <script src="{{ asset('js/fontawesome.js')}}"></script>
</body>
</html>

