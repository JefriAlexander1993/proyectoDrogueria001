@extends('layouts.apphome')
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
   @section('content')
     <div class="models--actions">
    <a class="btn btn-labeled btn-success" href="{{ route('producto.create') }}"><span class="btn-label"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
  </div>
                  <div class="row page-titles">
                        <div class="col-md-8 col-8 align-self-center">
                            <h3 class="text-themecolor m-b-0 m-t-0">Tabla de proveedores.</h3>
                           
                        </div>
                       
                    </div>
                    <div class="row">
                        <!-- column -->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Username</th>
                                                     <th colspan="2">&nbsp;</th>	
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <tr>
                                                    <td>6</td>
                                                    <td>Nigam</td>
                                                    <td>Eichmann</td>
                                                    <td>@Sonu</td>
                                                     <td><a class="btn btn-labeled btn-default" href="#"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    <button type="submit" class="btn btn-labeled btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
     
@endsection