@extends('layouts.apphome')
@section('content')
<div class="panel1 panel-primary">
      <div class="panel-heading"><strong>Información del venta.</strong>&nbsp;&nbsp;&nbsp;<a href="{{route('venta.edit', $venta->id)}}" class="btn btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
</div>
<div class="panel-body">
<div class="col-md-12">
<p>Fecha:&nbsp;{{$venta->fechaVenta}}</p> <!-- Imprimir el nombre del venta-->
<p>Usuario:&nbsp;{{$venta->usuario}}</p><!-- Descripcion corta-->
<p>Nombre Proveedor:&nbsp;{!!$venta->nombreProducto!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Cantidad:&nbsp;{!!$venta->cantidad!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Precio unitario:&nbsp;{!!$venta->precioUnitario!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Iva:&nbsp;{!!$venta->iva!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Valor total:&nbsp;{!!$venta->valorTotal!!}</p> <!-- Descripcion larga y se va interpretar--><!-- Descripcion larga y se va interpretar-->
</div>
</div>
</div>

@endsection