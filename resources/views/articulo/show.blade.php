@extends('layouts.app3')
@section('content')
<div class="row">
    <div class="col-sm-8"><strong>Ver un articulo.</strong></div>
    <div class="col-sm-2"><strong>Editar articulo</strong>
        <a href="{{route('articulo.edit', $articulo->id)}}" class="btn btn-xs btn-block btn-primary" title="Editar articulo"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
    </div>
    <div class="col-sm-2">
        <strong>Listar articulo</strong>
        <a href="{{route('articulo.index')}}" class="btn btn-xs btn-block btn-warning" title="Listado de articulos"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
    </div>
</div>
<hr>
<h6 class="text-center"><b>Información del proveedor</b></h6>
<hr>
@foreach ($articulo->proveedores as $articulo1)
<div class="row">
    <div class="col-sm-3"><b>Proveedor: </b> {{$articulo1->nombreproveedor}}</div>
    <div class="col-sm-3"><b>Nit: </b> {{$articulo1->nit}}</div>
    <div class="col-sm-3"><b>Represante: </b> {{$articulo1->nombrerepresentante}}</div>
    <div class="col-sm-3"><b>Email: </b> {{$articulo1->email}}</div>
</div>
@endforeach
<hr>
<h6 class="text-center"><b>Información del producto</b></h6>
<hr>
<div class="col-sm-12 table-responsive-sm">
<table class="table">
   
    <thead>
        <tr>

            <th>Codigo</th>
            <th>Fecha de vencimiento</th>
            <th>Nombre</th>
            <th>Precio unitario</th>
            <th>Iva</th>
            <th>Precio venta</th>
            <th>Stock</th>
            <th>Fecha de creación</th>
        </tr>
    </thead>
    <tbody>
        <tr>

            <td>{{$articulo->codigo}}</td>
            <td>{{$articulo->fechavencimiento}}</td>
            <td>{{$articulo->nombre}}</td>
            <td>{!!$articulo->preciounitario!!}</td>
            <td>{!!$articulo->iva!!}</td>
            <td>{!!$articulo->precioventa!!}</td>
            <td>{!!$articulo->stockmin!!}</td>
            <td>{!!$articulo->created_at!!}</td>
        </tr>
    </tbody>
</table>
</div>

@endsection

