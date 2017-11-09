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
		<th class="text-center">#Factura</th>
		<th class="text-center">Fecha</th>
		<th class="text-center">Total</th>
		<th class="text-center" colspan="3">Acción</th>	
        </tr>
	</thead>
	<tbody>
		@foreach ($ventas as $venta)
	   <tr>
	   <td align="center">{{$venta->id}}</td>
	   <td align="center">{{$venta->created_at}}</td>
       <td align="center">{{$venta->totalventa}}</td>
	   <td align="center"> <a href="{{route('venta.edit', $venta->id)}}" class="btn btn-sm btn-default"><i  class="fa fa-pencil-square-o" aria-hcodigoden="true"></i></a></td>
	   <td align="center"> <a href="{{route('venta.show', $venta->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hcodigoden="true"></i></a></td>
	   <td align="center"><form action="{{route('venta.destroy', $venta->id)}}" method="POST">
       {{csrf_field()}} <!--Toque para que sea eliminado por la aplicacion-->
       <input type="hidden" name="_method" value="DELETE">	
	   <button class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>	
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