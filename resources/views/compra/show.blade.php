@extends('layouts.apphome')
@section('content')

 <div class="panel1 panel-primary">
      <div class="panel-heading"><strong>Información de la compra.</strong>&nbsp;&nbsp;&nbsp;@role('admin')<a href="{{route('compra.edit', $compra->id)}}" class="btn btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>@endrole

      	<a href="{{route('compra.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>


</div>
<div class="panel-body">
<div class="col-md-12">

@foreach($detalles as $detalle)
---------------------------------------------------------------------------------------
<p>Numero de venta:&nbsp;{{ $detalle->compra_id }}</p> 
<p>Nombre:&nbsp;{{$detalle->nombre}}</p><!-- Descripcion corta-->
<p>Cantidad:&nbsp;{{$detalle->cantidad}}</p><!-- Descripcion corta-->
<p>Precio unitario:&nbsp;{!!$detalle->preciounitario!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Subtotal:&nbsp;{!!$detalle->subtotal!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Total:&nbsp;{!!$detalle->total!!}</p> <!-- Descripcion larga y se va interpretar-->


@endforeach

</div>
</div>
</div>

@endsection