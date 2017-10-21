@extends('layouts.apphome')
@section('content')

 <div class="panel1 panel-primary">
      <div class="panel-heading"><strong>Información del articulo.</strong>&nbsp;&nbsp;&nbsp;@role('admin')<a href="{{route('articulo.edit', $articulo->id)}}" class="btn btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>@endrole
      	<a href="{{route('articulo.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>

</div>
<div class="panel-body">
<div class="col-md-12">
<p><strong>Codigo:&nbsp;</strong>{{$articulo->codigo}}</p> <!-- Imprimir el nombre del articulo-->
<p>Descripcion:&nbsp;{{$articulo->descripcion}}</p><!-- Descripcion corta-->
<p>Marca:&nbsp;{!!$articulo->marca!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Rubro:&nbsp;{!!$articulo->rubro!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Precio Venta:&nbsp;{!!$articulo->precioVenta!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Stock:&nbsp;{!!$articulo->stock!!}</p> <!-- Descripcion larga y se va interpretar-->
</div>
</div>
</div>

@endsection