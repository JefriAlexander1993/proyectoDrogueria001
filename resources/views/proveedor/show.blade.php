@extends('layouts.app3')
@section('content')

<div class="card  col-sm-12" style="margin-left:auto;">
    <div class="titulo-contenido"><strong>INFORMACION DEL PROVEEDOR</strong></div>
    <div class="card-body t">
        <strong>Acciones:</strong>
        <a href="{{route('proveedor.edit', $proveedor->id)}}" class="btn btn-primary btn-xs" title="Editar proveedor"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        <a href="{{route('proveedor.index')}}" class="btn btn-ligth btn-xs" title="Listado de proveedores"><i class="fa fa-list-alt" aria-hidden="true"></i></a>

        <p><strong>Nit:</strong>&nbsp;{{$proveedor->nit}}</p> <!-- Imprimir el nombre del proveedor-->
        <p><strong>Nombre proveedor:</strong>&nbsp;{{$proveedor->nombreproveedor}}</p><!-- Descripcion corta-->
        <p><strong>Nombre de representante:</strong>&nbsp;{!!$proveedor->nombrerepresentante!!}</p> <!-- Descripcion larga y se va interpretar-->
        <p><strong>Dirección:</strong>&nbsp;{!!$proveedor->direccion!!}</p> <!-- Descripcion larga y se va interpretar-->
        <p><strong>Teléfono:</strong>&nbsp;{!!$proveedor->telefono!!}</p> <!-- Descripcion larga y se va interpretar-->
        <p><strong>Email:</strong>&nbsp;{!!$proveedor->email!!}</p> <!-- Descripcion larga y se va interpretar-->
        <p><strong>Observación:</strong>&nbsp;{!!$proveedor->observacion!!}</p>
    </div>
    <div class="card-footer bg-transparent ">

    </div>
</div>
@endsection
