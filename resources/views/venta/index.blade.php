@extends('layouts.apphome')
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
   @section('content')
   <div class="col-sm-12">
<a href="{{route('venta.create')}}" class="btn btn-success"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
</div>

<div class="row">
<div class="col-sm-8" style="text-align:center"><h2><strong>LISTADO DE VENTAS.</strong></h2>
</div>
<div class="col-sm-4">
@include('venta.fragment.aside') 
</div>
</div> 
<div class="col-md-12 table-responsive">
<table class="table table-hover ">
	<thead>
		<tr>
		<th class="text-center" >Id</th>
		<th class="text-center">Fecha de venta</th>
		<th class="text-center">Usuario</th>
		<th class="text-center">Nombre de proveedor</th>
		<th class="text-center">Cantidad</th>
		<th class="text-center">Precio unitario</th>
		<th class="text-center">Iva</th>
		<th class="text-center">Precio total</th>
		<th class="text-center" colspan="3">Acción</th>	
        </tr>
	</thead>
	<tbody>
		@foreach ($ventas as $venta)
	   <tr>
	   <td class="text-center">{{$venta->id}}</td>
	   <td class="text-center">{{$venta->fechaVenta}}</td>
       <td class="text-center">{{$venta->usuario}}</td>
       <td class="text-center">{{$venta->nombreProducto}}</td>
       <td class="text-center">{{$venta->cantidad}}</td>
       <td class="text-center">{{$venta->precioUnitario}}</td>
       <td class="text-center">{{$venta->iva}}</td>
       <td class="text-center">{{$venta->precioTotal}}</td>
	   <td> <a href="{{route('venta.edit', $venta->id)}}" class="btn btn-labeled btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
	   <td> <a href="{{route('venta.show', $venta->id)}}" class="btn btn-labeled btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
	   <td><form action="{{route('venta.destroy', $venta->id)}}" method="POST">
       {{csrf_field()}} <!--Toque para que sea eliminado por la aplicacion-->
       <input type="hidden" name="_method" value="DELETE">	
	   <button class="btn btn-labeled btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>	
	   </form>
	   </td>
	   </tr>
@endforeach
	</tbody>
</table>
<div class="col-md-11" align="center" >
{!!$ventas->render() !!}
<?php 
echo phpversion('tidy');
?>
</div>
</div>

</div>
</div>
               
     
@endsection