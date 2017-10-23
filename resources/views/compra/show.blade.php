@extends('layouts.apphome')
@section('content')

 <div class="panel1 panel-primary">
      <div class="panel-heading"><strong>Información de la compra.</strong>&nbsp;&nbsp;&nbsp;@role('admin')<a href="{{route('compra.edit', $compras->id)}}" class="btn btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>@endrole

      	<a href="{{route('compra.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>


</div>
<div class="panel-body">
<div class="col-md-12">
<p><strong>Fecha de llegada:&nbsp;</strong>{{$compras->fechaLllegada}}</p> <!-- Imprimir el nombre del compra-->
<p>Nombre:&nbsp;{{$compras->nombre}}</p><!-- Descripcion corta-->
<p>Precio de compra:&nbsp;{!!$compras->precioCompra!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Cantidad:&nbsp;{!!$compras->cantidad!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Iva:&nbsp;{!!$compras->iva!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Precio de venta:&nbsp;{!!$compras->precioVenta!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Fecha de vencimiento:&nbsp;{!!$compras->fechaVencimiento!!}</p><!--Descripcion larga y se va interpretar-->
<p>Nombre de proveedor:&nbsp;{!!$compras->nombreProveedor!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Stock:&nbsp;{!!$compras->stock!!}</p> <!-- Descripcion larga y se va interpretar-->
</div>
</div>
</div>

@endsection