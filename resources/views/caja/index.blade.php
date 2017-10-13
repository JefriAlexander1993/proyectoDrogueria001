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
        <th class="text-center">Id</th>
        <th class="text-center">Nombre Usuario</th>
        <th class="text-center">Caja Inicial</th>
        <th class="text-center">Caja Final</th>
        <th class="text-center">Ganancia</th>
        
        <th class="text-center" colspan="4" >Acción</th>	
                                                </tr>
                                            </thead>
    <tbody>
        @foreach ($cajas as $caja)
        <tr>
       <td class="text-center">{{$caja->id}}</td>
       <td class="text-center">{{$caja->nombreUsuario}}</td>
       <td class="text-center">{{$caja->valorInicial}}</td>
       <td class="text-center">{{$caja->valorFinal}}</td>
       <td class="text-center">{{$caja->ganancia}}</td>
       <td><a href="{{route('caja.create')}}" class="btn btn-success pull-right"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></div></td>
       <td> <a href="{{route('caja.edit', $caja->id)}}" class="btn btn-labeled btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
       <td> <a href="{{route('caja.show', $caja->id)}}" class="btn btn-labeled btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
       <td><form action="{{route('caja.destroy', $caja->id)}}" method="POST">
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
{!!$cajas->render() !!}
<?php 
echo phpversion('tidy');
?>
</div>
</div>

</div>
</div>



@endsection