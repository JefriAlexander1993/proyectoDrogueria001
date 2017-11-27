@extends('layouts.apphome')
@section('content')

<div class="col-sm-12">
<a href="{{route('caja.create')}}" class="btn btn-success"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
<a href="{{url('/cajapdf')}}" class="btn btn btn-secondary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>

</div>

<div class="row">
<div class="col-sm-8" style="text-align:center"><h2><strong>LISTADO DE CAJA.</strong></h2>
</div>
<div class="col-sm-4">
@include('caja.fragment.aside') 
</div>
</div> 
<div class="col-md-12 table-responsive">
<table class="table table-hover">
    <thead>
        <tr>
        <th  class="text-center">Id</th>
        <th  class="text-center">Nombre usuario</th>
        <th  class="text-center">Caja inicial</th>
        <th  class="text-center">Caja final</th>
        <th  class="text-center">Ganancia</th>
        <th  class="text-center"colspan="3" >Acción</th>	
        </tr>
        </thead>
    <tbody>
        @foreach ($cajas as $caja)
       <tr>
       <td align="center">{{$caja->id}}</td>
       <td align="center">{{$caja->nombreusuario}}</td>
       <td align="center">{{$caja->valorinicial}}</td>
       <td align="center">{{$caja->valorfinal}}</td>
       <td align="center">{{$caja->ganancia}}</td>
       <td><a id="edit" href="{{route('caja.edit', $caja->id)}}" class="btn btn-sm btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
	   <td><a href="{{route('caja.show', $caja->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
       <td><form action="{{route('caja.destroy', $caja->id)}}" method="POST">
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
{!!$cajas->render() !!}
<?php 
echo phpversion('tidy');
?>
</div>
</div>
</div>
</div>

@endsection