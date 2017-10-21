
@extends('layouts.apphome')
@section('content')

<div class="col-sm-12">
  
<a href="{{route('cliente.create')}}" class="btn btn-success"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
@role('admin')
<a href="{{url('/clientepdf')}}" class="btn btn btn-secondary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
@endrole
</div>

<div class="row">
<div class="col-sm-7" style="text-align:center"><h2><strong>LISTADO DE CLIENTES.</strong></h2>
</div>
<div class="col-sm-4">
@include('cliente.fragment.aside') 
</div>
</div> 

<div class="col-md-12 table-responsive" style="text-align:center" >

<table class="table table-hover">
    <thead>
        <tr>
        <th class="text-center">Nombre</th>
        <th class="text-center">Telefono</th>
        <th class="text-center">Direccion</th>
        <th class="text-center">Correo Electronico</th>
        <th class="text-center">Nombre Medicamento</th>
        <th class="text-center">Observacion</th>
        <th class="text-center" colspan="3" >Acción</th>    
        </tr>
        </thead>
    <tbody>
        @foreach ($clientes as $cliente)
       <tr>
       <td class="text-center">{{$cliente->nombre}}</td>
       <td class="text-center">{{$cliente->telefono}}</td>
       <td class="text-center">{{$cliente->direccion}}</td>
       <td class="text-center">{{$cliente->correoElectronico}}</td>
       <td class="text-center">{{$cliente->nombreMedicamento}}</td>
       <td class="text-center">{{$cliente->observacion}}</td>
       <td>@role('admin')<a href="{{route('cliente.edit', $cliente->id)}}" class="btn btn-labeled btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>@endrole
       <td><a href="{{route('cliente.show', $cliente->id)}}" class="btn btn-labeled btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
       <td>@role('admin')<form action="{{route('cliente.destroy', $cliente->id)}}" method="POST">
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