@extends('layouts.apphome')
@section('content')

 <div class="panel1 panel-primary">
<<<<<<< HEAD
      <div class="panel-heading"><strong>Información del compra.</strong>&nbsp;&nbsp;&nbsp;@role('admin')<a href="{{route('compra.edit', $compra->id)}}" class="btn btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>@endrole
=======
      <div class="panel-heading"><strong>Información de la compra.</strong>&nbsp;&nbsp;&nbsp;@role('admin')<a href="{{route('compra.edit', $compras->id)}}" class="btn btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>@endrole
>>>>>>> f1ed23d7815e804265035c3f93658fe94b9ba3e3

      	<a href="{{route('compra.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>


</div>
<div class="panel-body">
<div class="col-md-12">
<<<<<<< HEAD
<p><strong>Fecha de llegada:&nbsp;</strong>{{$compra->fechaLllegada}}</p> <!-- Imprimir el nombre del producto-->
<p>Nombre:&nbsp;{{$compra->nombre}}</p><!-- Descripcion corta-->
<p>Precio de compra:&nbsp;{!!$compra->precioCompra!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Cantidad:&nbsp;{!!$compra->cantidad!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Iva:&nbsp;{!!$compra->iva!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Precio de venta:&nbsp;{!!$compra->precioVenta!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Fecha de vencimiento:&nbsp;{!!$compra->fechaVencimiento!!}</p><!--Descripcion larga y se va interpretar-->
<p>Nombre de proveedor:&nbsp;{!!$compra->nombreProveedor!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Stock:&nbsp;{!!$compra->stock!!}</p> <!-- Descripcion larga y se va interpretar-->
=======
<p><strong>Fecha de llegada:&nbsp;</strong>{{$compras->fechaLllegada}}</p> <!-- Imprimir el nombre del compra-->
<p>Nombre:&nbsp;{{$compras->nombre}}</p><!-- Descripcion corta-->
<p>Precio de compra:&nbsp;{!!$compras->precioCompra!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Cantidad:&nbsp;{!!$compras->cantidad!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Iva:&nbsp;{!!$compras->iva!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Precio de venta:&nbsp;{!!$compras->precioVenta!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Fecha de vencimiento:&nbsp;{!!$compras->fechaVencimiento!!}</p><!--Descripcion larga y se va interpretar-->
<p>Nombre de proveedor:&nbsp;{!!$compras->nombreProveedor!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Stock:&nbsp;{!!$compras->stock!!}</p> <!-- Descripcion larga y se va interpretar-->
>>>>>>> f1ed23d7815e804265035c3f93658fe94b9ba3e3
</div>
</div>
</div>

@endsection