@extends('layouts.apphome')
@section('content')

 <div class="panel1 panel-primary">
      <div class="panel-heading"><strong>Información del articulo.</strong>&nbsp;&nbsp;&nbsp;@role('admin')<a href="{{route('articulo.edit', $articulo->id)}}" class="btn btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>@endrole
      	<a href="{{route('articulo.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>

</div>
<div class="panel-body">
<div class="col-md-12">
<p><strong>Codigo:&nbsp;</strong>{{$articulo->codigo}}</p> <!-- Imprimir el nombre del articulo-->
<p>Fecha de vencimiento:&nbsp;{{$articulo->fechavencimiento}}</p><!-- Descripcion corta-->
<p>Nombre:&nbsp;{{$articulo->nombre}}</p><!-- Descripcion corta-->
<p>Rubro:&nbsp;{!!$articulo->rubro!!}</p>
<p>Marca:&nbsp;{!!$articulo->marca!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Precio unitario:&nbsp;{!!$articulo->preciounitario!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Precio venta:&nbsp;{!!$articulo->precioventa!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Stock:&nbsp;{!!$articulo->stockmin!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Stock:&nbsp;{!!$articulo->created_at!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Stock:&nbsp;{!!$articulo->updated_at!!}</p> <!-- Descripcion larga y se va interpretar-->


</div>
</div>
</div>


   


@endsection