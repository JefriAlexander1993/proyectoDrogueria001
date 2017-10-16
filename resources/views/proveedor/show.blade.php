@extends('layouts.apphome')
@section('content')
<div class="panel1 panel-primary">
      <div class="panel-heading"><strong>Información del proveedor.</strong>&nbsp;&nbsp;&nbsp;<a href="{{route('proveedor.edit', $proveedor->id)}}" class="btn btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
</div>
<div class="panel-body">
<div class="col-md-12">
<p>Nit:&nbsp;{{$proveedor->nit}}</p> <!-- Imprimir el nombre del proveedor-->
<p>Nombre proveedor:&nbsp;{{$proveedor->nombreProveedor}}</p><!-- Descripcion corta-->
<p>Nombre de representante:&nbsp;{!!$proveedor->nombreRepresentante!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Dirección:&nbsp;{!!$proveedor->direccion!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Teléfono:&nbsp;{!!$proveedor->telefono!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Email:&nbsp;{!!$proveedor->email!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Observación:&nbsp;{!!$proveedor->observacion!!}</p> <!-- Descripcion larga y se va interpretar--><!-- Descripcion larga y se va interpretar-->
</div>
</div>
</div>

@endsection