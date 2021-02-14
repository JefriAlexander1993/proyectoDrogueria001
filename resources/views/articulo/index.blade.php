@extends('layouts.app3')
@section('content')
<strong>LISTADO DE ARTICULOS.</strong>
<hr>
     <div class="row">
            <div class="col-sm-3">
                <strong>Crear articulo:</strong> <a class="btn btn-success btn-xs btn-block" href="{{route('articulo.create')}}" title="Crear articulo"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
            </div>
            <div class="col-sm-3">
                <strong>Generar pdf:</strong>
                <a href="{{url('/articulopdf')}}" target="_blank" class="btn btn-danger btn-block btn-xs" title="Generar pdf de articulos"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
            </div>
            
            <div class="col-sm-6">
                @include('articulo.fragment.aside')
            </div>
        </div>

        <div class="table-responsive-sm">
            <table class="table table-striped table-bordered" id="tablaArticulo">
                <caption>Listado de articulos</caption>
                <thead>
                    <tr>
                        <th class="text-center">Codigo</th>
                        <th class="text-center">Fecha vencimiento</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Precio_U</th>
                        <th class="text-center">Precio_V</th>
                        <th class="text-center">Ver</th>
                        <th class="text-center">Editar</th>
                        <th class="text-center">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articulos as $articulo)
                    <tr>
                        <td class="text-center">{{$articulo->codigo}}</td>
                        <td class="text-center">{{$articulo->fechavencimiento}}</td>
                        <td class="text-center">{{$articulo->nombre}}</td>
                        <td class="text-center">{{$articulo->preciounitario}}</td>
                        <td class="text-center">{{$articulo->precioventa}}</td>
                        <td class="text-center"><a href="{{route('articulo.show', $articulo->id)}}" class="btn btn-light btn-xs" title="Ver articulo"><i class="fas fa-eye" aria-hidden="true"></i></a></td>
                     
                        <td class="text-center"><a href="{{route('articulo.edit', $articulo->id)}}" class="btn btn-xs btn-primary" title="Editar producto"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                           <td class="text-center">
                            <form action="{{route('articulo.destroy', $articulo->id)}}" method="POST">
                                {{csrf_field()}}
                                <!--Toque para que sea eliminado por la aplicacion-->
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-xs btn-danger" title="Eliminar producto"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

@endsection

