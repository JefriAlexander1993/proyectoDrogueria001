@extends('layouts.apphome')
@section('content')

<div class="col-sm-12">
  @role('admin')
<a href="{{route('articulo.create')}}" class="btn btn-success"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
<a href="{{url('/articulopdf')}}" class="btn btn btn-secondary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
@endrole
</div>

<div class="row">
<div class="col-sm-7" style="text-align:center"><h2><strong>LISTADO DE ARTICULOS.</strong></h2>
</div>
<div class="col-sm-4">
@include('articulo.fragment.aside') 
</div>
</div> 

<div class="col-md-12 table-responsive" style="text-align:center" >

<table class="table table-hover">
    <thead>
        <tr>
        <th class="text-center">Codigo</th>
        <th class="text-center">Fecha vencimiento</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">Rubro</th>
        <th class="text-center">Marca</th>
        <th class="text-center">preciounitario</th>
        <th class="text-center">precioventa</th>
        <th class="text-center">Stock minimo</th>
        <th class="text-center">Fecha de creación</th>
     
   
        <th class="text-center" colspan="3" >Acción</th>	
    
        </tr>
        </thead>
    <tbody>
        @foreach ($articulos as $articulo)
       <tr>
       <td class="text-center">{{$articulo->codigo}}</td>
       <td class="text-center">{{$articulo->fechavencimiento}}</td>
       <td class="text-center">{{$articulo->nombre}}</td>
       <td class="text-center">{{$articulo->rubro}}</td>
       <td class="text-center">{{$articulo->marca}}</td>
       <td class="text-center">{{$articulo->preciounitario}}</td>
       <td class="text-center">{{$articulo->precioventa}}</td>
       <td class="text-center">{{$articulo->stockmin}}</td>
       <td class="text-center">{{$articulo->created_at}}</td>
     
       <td>@role('admin')<a href="{{route('articulo.edit', $articulo->id)}}" class="btn btn-labeled btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>@endrole
	   <td><a href="{{route('articulo.show', $articulo->id)}}" class="btn btn-labeled btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
       <td>@role('admin')<form action="{{route('articulo.destroy', $articulo->id)}}" method="POST">
       {{csrf_field()}} <!--Toque para que sea eliminado por la aplicacion-->
       <input type="hidden" name="_method" value="DELETE">	
	   <button class="btn btn-labeled btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>	
	   </form>@endrole
	   </td>
       </tr>
       @endforeach
        </tbody>
</table>


<div class="col-md-11" align="center" >

<?php 
echo phpversion('tidy');
?>
</div>
</div>




@endsection
