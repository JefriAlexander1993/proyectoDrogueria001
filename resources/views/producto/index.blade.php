@extends('layouts.apphome')
@section('content')
<div class="col-sm-12">
   <a href="{{route('producto.create')}}" class="btn btn-success"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
   </div>  
   <div class="row">
   <div class="col-sm-7" style="text-align:center"><h2>LISTADO DE PRODUCTO.</h2>
   </div>
   <div class="col-sm-4">
   @include('producto.fragment.aside') 
   </div>
   </div> 


<div class="col-md-12 table-responsive">
<table class="table table-hover ">
	<thead>
		<tr>
		<th class="text-center">Codigo</th>
		<th class="text-center">Fecha de llegada</th>
		<th class="text-center">Nombre</th>
		<th class="text-center">Rubio</th>
		<th class="text-center">Proveedor</th>
		<th class="text-center">Precio de unitario</th>
		<th class="text-center">Cant</th>
		<th class="text-center">Total de compra</th>
		<th class="text-center">Iva</th>
		<th class="text-center">Precio de Venta</th>
		<th class="text-center" >Fecha de vencimiento</th>
		<th class="text-center">Stock</th>
		<th class="text-center" colspan="4" >Acción</th>	
	
		</tr>
	</thead>
	<tbody>
		@foreach ($productos as $producto)
	   <tr>
	   <td class="text-center">{{$producto->codigo}}</td>
	   <td class="text-center">{{$producto->fechaLlegada}}</td>
       <td class="text-center">{{$producto->nombre}}</td>
       <td class="text-center">{{$producto->rubio}}</td>
	   <td class="text-center">{{$producto->nombreProveedor}}</td>
       <td class="text-center">{{$producto->precioCompra}}</td>
       <td class="text-center">{{$producto->cantidad}}</td>
       <td class="text-center">{{$producto->totalCompra}}</td>
       <td class="text-center">{{$producto->iva}}</td>
       <td class="text-center">{{$producto->precioVenta}}</td>
       <td class="text-center">{{$producto->fechaVencimiento}}</td>
	   <?php
	  
	   
	//    $stock = DB::table('productos')->select('cantidad')->where('id'=='2')->value('stock');
	//    $cantidad = DB::table('productos')->where('id', '13')->value('cantidad');
	//    $suma = $stock + $cantidad ;
	//    $stockActual = DB::table('productos')
	//    ->where('id', 13)
	//   ->update(['stock' => $suma]);
	
	
?>
       <td class="text-center">{{$producto->stock}}</td>
	   <td><a href="{{route('producto.edit', $producto->id)}}" class="btn btn-labeled btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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
<div class="col-md-11" align="center" >
{!!$productos->render() !!}
<?php 
echo phpversion('tidy');
?>
</div>
</div>

</div>
</div>



@endsection