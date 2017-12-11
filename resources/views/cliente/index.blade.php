@extends('layouts.apphome')
@section('content')

<div class="col-sm-12">
  
<a href="{{route('cliente.create')}}" class="btn btn-success"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
@role('admin')
<a href="{{url('/clientepdf')}}" target="_blank" class="btn btn btn-secondary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
@endrole
</div>

<div class="row">
<div class="col-sm-7" style="text-align:center"><h2><strong>LISTADO DE CLIENTES.</strong></h2>
</div>
<div class="col-sm-4">
@include('cliente.fragment.aside') 
</div>
</div> 
{!!Form::open(['route'=>'cliente.index', 'method'=>'GET','class'=>'navbar-form'])!!}
<div class="col-sm-5 input-group">
{!!Form::number('nuip',null,['class'=>'form-control' , 'placeholder'=>'Buscar..', 'aria-describedby'=>'search'])!!}
<span class="input-group-addon" id="search">
<i class="fa fa-search" aria-hidden="true"></i>
</span>
</div>
{!!Form::close()!!}
<div class="col-md-12 table-responsive" style="text-align:center" >

<table class="table table-hover">
    <thead>
        <tr>
        <th class="text-center">Nuip</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">Telefono</th>
        <th class="text-center">Direccion</th>
        <th class="text-center">Correo Electronico</th>
        <th class="text-center">Observacion</th>
        <th class="text-center" colspan="3" >Acción</th>    
        </tr>
        </thead>
    <tbody>
        @foreach ($clientes as $cliente)
       <tr>
       <td align="center">{{$cliente->nuip}}</td>
       <td align="center">{{$cliente->nombre}}</td>
       <td align="center">{{$cliente->telefono}}</td>
       <td align="center">{{$cliente->direccion}}</td>
       <td align="center">{{$cliente->correoelectronico}}</td>
       <td align="center">{{$cliente->observacion}}</td>
       <td align="center">@role('admin')<a href="{{route('cliente.edit', $cliente->id)}}" class="btn btn-sm btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>@endrole
       <td align="center"><a href="{{route('cliente.show', $cliente->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
       <td align="center">@role('admin')<form action="{{route('cliente.destroy', $cliente->id)}}" method="POST">
       {{csrf_field()}} <!--Toque para que sea eliminado por la aplicacion-->
       <input type="hidden" name="_method" value="DELETE">  
       <button class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
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