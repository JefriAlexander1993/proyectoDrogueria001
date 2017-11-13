@extends('layouts.apphome')
@section('content')

 <div class="panel1 panel-primary">
      <div class="panel-heading"><strong>Información del cliente.</strong>&nbsp;&nbsp;&nbsp;@role('admin')<a href="{{route('cliente.edit', $cliente->id)}}" class="btn btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>@endrole
      	<a href="{{route('cliente.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>

</div>
<div class="panel-body">
<div class="col-md-12">
<p><strong>Nombre:&nbsp;</strong>{{$cliente->nombre}}</p> <!-- Imprimir el nombre del cliente-->
<p><strong>Telefono:&nbsp;</strong>{{$cliente->telefono}}</p><!-- Telefono del cliente-->
<p><strong>Direccion:&nbsp;</strong>{!!$cliente->direccion!!}</p> <!-- Direccion del cliente-->
<p><strong>Correo Electronico:&nbsp;</strong>{!!$cliente->correoelectronico!!}</p> <!-- Correo electronico del cliente-->
<p><strong>Observacion:&nbsp;</strong>{!!$cliente->observacion!!}</p> <!-- Descripcion larga y se va interpretar-->
</div>
</div>
</div>

@endsection