@extends('layouts.apphome')
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
   @section('content')
   @role('admin')
   <div class="col-sm-12">
   <a href="{{route('proveedor.create')}}" class="btn btn-success"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
   <a href="{{url('/proveedorpdf')}}" class="btn btn btn-secondary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
   </div>
   @endrole 
   <div class="row">
   <div class="col-sm-8" style="text-align:center"><h2><strong>LISTADO DE PROVEEDOR.</strong></h2>
   </div>
   <div class="col-sm-4">
   @include('proveedor.fragment.aside') 
   </div>
   </div> 
<div class="col-md-12 table-responsive">
<table class="table table-hover ">
	<thead>
		<tr>
		<th align="center" >Id</th>
		<th align="center">Nit</th>
		<th align="center">Nombre de proveedor</th>
		<th align="center">Nombre de representante</th>
		<th align="center">Dirección</th>
		<th align="center">Telefono</th>
		<th align="center">Email</th>
		<th align="justify">Observación</th>
		<th align="center" colspan="3" >Acción</th>	
		</tr>
	</thead>
	<tbody>
		@foreach ($proveedors as $proveedor)
	   <tr>
       <td align="center">{{$proveedor->id}}</td>
	   <td align="center">{{$proveedor->nit}}</td>
       <td align="center">{{$proveedor->nombreProveedor}}</td>
       <td align="center">{{$proveedor->nombreRepresentante}}</td>
       <td align="center">{{$proveedor->direccion}}</td>
       <td align="center">{{$proveedor->telefono}}</td>
       <td align="center">{{$proveedor->email}}</td>
       <td class="text-justify">{{$proveedor->observacion}}</td>
	   <td> <a href="{{route('proveedor.edit', $proveedor->id)}}" class="btn btn-labeled btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
	   <td> <a href="{{route('proveedor.show', $proveedor->id)}}" class="btn btn-labeled btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
	   <td><form action="{{route('proveedor.destroy', $proveedor->id)}}" method="POST">
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
{!!$proveedors->render() !!}
<?php 
echo phpversion('tidy');
?>
</div>
</div>
</div>
</div>

     
@endsection