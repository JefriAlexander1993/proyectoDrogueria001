@extends('layouts.app3')
@section('content')

<strong>LISTADO DE PROVEEDOR.</strong>
<hr>
<div class="row">
    <div class="col-sm-3">
        <strong>Crear proveedor:</strong>
        <a href="{{route('proveedor.create')}}" class="btn btn-success btn-xs btn-block " title="Crear proveedor"><i class="fa fa-plus-circle"></i></a>
    </div>
    <div class="col-sm-3">
        <strong>Generar pdf:</strong>
        <a href="{{url('/proveedorpdf')}}" target="_blank" class="btn btn-danger btn-xs btn-block" title="Generar pdf de proveedores"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
    </div>
    <div class="col-sm-6">
        @include('proveedor.fragment.aside')
    </div>
</div>
<div class="col-md-12 table-responsive">
    <table class="table " id="table_proveedores_id">
        <thead>
            <tr>
            

                <th class="text-center">Nit</th>
                <th class="text-center">Proveedor</th>
                <th class="text-center">Representante</th>
                <th class="text-center">Email</th>
                <th class="text-center">Observación</th>
                <th class="text-center">Ver</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Eliminar</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $proveedor)
            <tr>
           
  
                <td align="center">{{$proveedor->nit}}</td>
                <td align="center">{{$proveedor->nombreproveedor}}</td>
                <td align="center">{{$proveedor->nombrerepresentante}}</td>
                <td align="center">{{$proveedor->email}}</td>
                <td align="center">{{$proveedor->observacion}}</td>
              
                <td align="center"> <a href="{{route('proveedor.show', $proveedor->id)}}" class="btn btn-xs btn btn-light" title="Ver proveedor"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                <td align="center"> <a href="{{route('proveedor.edit', $proveedor->id)}}" class="btn btn-xs btn-primary" title="Editar proveedror" id="editProveedor"><i class="far fa-edit" aria-hidden="true"></i></a></td>
                <td align="center">
                    <form action="{{route('proveedor.destroy', $proveedor->id)}}" method="POST">
                        {{csrf_field()}}
                        <!--Toque para que sea eliminado por la aplicacion-->
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-xs btn-danger" title="Eliminar proveedor"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

