@extends('layouts.apphome')
@section('content')

 <div class="panel1 panel-primary">
      <div class="panel-heading"><strong>Información del producto.</strong>&nbsp;&nbsp;&nbsp;@role('admin')<a href="{{route('producto.edit', $product->id)}}" class="btn btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>@endrole

      	<a href="{{route('producto.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>


</div>
<div class="panel-body">
<div class="col-md-12">
<p><strong>Fecha de llegada:&nbsp;</strong>{{$product->fechaLllegada}}</p> <!-- Imprimir el nombre del producto-->
<p>Nombre:&nbsp;{{$product->nombre}}</p><!-- Descripcion corta-->
<p>Precio de compra:&nbsp;{!!$product->precioCompra!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Cantidad:&nbsp;{!!$product->cantidad!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Iva:&nbsp;{!!$product->iva!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Precio de venta:&nbsp;{!!$product->precioVenta!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Fecha de vencimiento:&nbsp;{!!$product->fechaVencimiento!!}</p><!--Descripcion larga y se va interpretar-->
<p>Nombre de proveedor:&nbsp;{!!$product->nombreProveedor!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Stock:&nbsp;{!!$product->stock!!}</p> <!-- Descripcion larga y se va interpretar-->
</div>
</div>
</div>

@endsection