@extends('layouts.apphome')
@section('content')

 <div class="panel1 panel-primary">
      <div class="panel-heading"><strong>Información del cliente.</strong>&nbsp;&nbsp;&nbsp;@role('admin')<a href="{{route('cliente.edit', $cliente->id)}}" class="btn btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>@endrole
      	<a href="{{route('cliente.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>

</div>
<div class="panel-body">
<div class="col-md-12">
<p><strong>Codigo:&nbsp;</strong>{{$cliente->nombre}}</p> <!-- Imprimir el nombre del cliente-->
<p>Descripcion:&nbsp;{{$cliente->telefono}}</p><!-- Descripcion corta-->
<p>Marca:&nbsp;{!!$cliente->direccion!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Rubro:&nbsp;{!!$cliente->correoelectronico!!}</p> <!-- Descripcion larga y se va interpretar--><!-- Descripcion larga y se va interpretar-->
<p>Stock:&nbsp;{!!$cliente->observacion!!}</p> <!-- Descripcion larga y se va interpretar-->
</div>
</div>
</div>

@endsection