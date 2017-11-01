@extends('layouts.apphome')
@section('content')
<div class="col-sm-12">
@role('admin')
   <a href="{{route('compra.create')}}" class="btn btn-success"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
   <a href="{{url('/productopdf')}}" class="btn btn btn-secondary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>

   @endrole</div>  

   <div class="row">
   <div class="col-sm-7" style="text-align:center"><h2><strong>LISTADO DE COMPRAS.</strong></h2>
   </div>
   <div class="col-sm-4">
   @include('compra.fragment.aside') 
   </div>
   </div> 


<div class="col-md-12 table-responsive">
<table class="table table-hover ">
	<thead>
		<tr>
		<th class="text-center">Codigo</th>
		<th class="text-center">Fecha de llegada</th>
		<th class="text-center">Nombre</th>
		<th class="text-center">Cant</th>
		<th class="text-center">Precio de unitario</th>
		<th class="text-center">Iva</th>
		<th class="text-center">Valor Total</th>
		
		<th class="text-center" colspan="4" >Acción</th>	
	
		</tr>
	</thead>
	<tbody>
		@foreach ($compras as $compra)
	   <tr>
	   <td class="text-center">{{$compra->id}}</tdd>
	   <td class="text-center">{{$compra->fechacompra}}</td>
	   <td class="text-center">{{$compra->nombre}}</td>
	   <td class="text-center">{{$compra->cantidad}}</td>
       <td class="text-center">{{$compra->valorunitario}}</td>
       <td class="text-center">{{$compra->iva}}</td>
	   <td class="text-center">{{$compra->valortotal}}</td>
    
	
	   <td>@role('admin')<a href="{{route('compra.edit', $compra->id)}}" class="btn btn-labeled btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>@endrole</td>
	   <td> <a href="{{route('compra.show', $compra->id)}}" class="btn btn-labeled btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
	   <td>@role('admin')<form action="{{route('compra.destroy', $compra->id)}}" method="POST">
       {{csrf_field()}} <!--Toque para que sea eliminado por la aplicacion-->
       <input type="hidden" name="_method" value="DELETE">	
	   <button class="btn btn-labeled btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>	
	   </form>@endrole('admin')
	   </td>
	   </tr>
@endforeach
	</tbody>
</table>
<div class="col-md-11" align="center" >
{!!$compras->render() !!}
<?php 
echo phpversion('tidy');
?>
</div>
</div>

</div>
</div>



@endsection