@extends('layouts.apphome')
@section('content')

<div class="row">
<div class="col-sm-7"><h2><strong>Listado de productos.</strong></h2></div>
<div class="col-sm-5">
@include('producto.fragment.aside') 
</div>
</div>
</div>

<div class="col-md-10 table-responsive">
<table class="table table-hover">
	<thead>
		<tr>
		<th class="text-center" >Id</th>
		<th class="text-center">Fecha de llegada</th>
		<th class="text-center">Nombre</th>
		<th class="text-center" >Precio de compra</th>
		<th class="text-center">Cant</th>
		<th class="text-center">Iva</th>
		<th class="text-center">Precio de Venta</th>
		<th class="text-center" >Fecha de vencimiento</th>
		<th class="text-center">Proveedor</th>
		<th class="text-center">Stock</th>
		<th class="text-center" colspan="4" >Acción</th>	
	
		</tr>
	</thead>
	<tbody>
		@foreach ($productos as $producto)
	   <tr>
	   <td class="text-center">{{$producto->id}}</td>
	   <td class="text-center"><strong>{{$producto->fechaLlegada}}</strong>
       <td class="text-center">{{$producto->nombre}}</td>
       <td class="text-center">{{$producto->precioCompra}}</td>
       <td class="text-center">{{$producto->cantidad}}</td>
       <td class="text-center">{{$producto->iva}}</td>
       <td class="text-center">{{$producto->precioVenta}}</td>
       <td class="text-center">{{$producto->fechaVencimiento}}</td>
       <td class="text-center">{{$producto->nombreProveedor}}</td>
       <td class="text-center">{{$producto->stock}}</td>
	   <td><a href="{{route('producto.create')}}" class="btn btn-success pull-right"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></div></td>
	   <td> <a href="{{route('producto.edit', $producto->id)}}" class="btn btn-labeled btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
	   <td> <a href="{{route('producto.show', $producto->id)}}" class="btn btn-labeled btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
	   <td><form action="{{route('producto.destroy', $producto->id)}}" method="POST">
       {{csrf_field()}} <!--Toque para que sea eliminado por la aplicacion-->
       <input type="hidden" name="_method" value="DELETE">	
	   <button class="btn btn-labeled btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>	
	   </form>
	   </td>
	   </tr>
@endforeach
	</tbody>
</table>
</div>
</div>

<div class="col-md-2 ">
{!! $productos->render() !!}
<?php 
echo phpversion('tidy');
?>
</div>
</div>



@endsection