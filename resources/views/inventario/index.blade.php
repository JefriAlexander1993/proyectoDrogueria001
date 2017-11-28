@extends('layouts.apphome')
@section('content')
<div class="row">
<div class="col-sm-1">
<div class="form-group">
{!!Form::hidden('fecha', $fecha,['class'=>'form-control','type'=>'hidden','id'=>'fecha'])!!}
</div>
</div>
<div class="col-sm-1">
<div class="form-group">
{!!Form::hidden('fechavencimiento', $fechavencimiento,['class'=>'form-control','id'=>'fechavencimiento'])!!}
</div>
</div>
</div>

<div class="col-sm-12">
  @role('admin')
<a href="{{url('/articulopdf')}}" class="btn btn btn-secondary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
@endrole
</div>

<div class="row">
<div class="col-sm-7" style="text-align:center"><h2><strong>INVENTARIO.</strong></h2>
</div>
<div class="col-sm-4">
@include('inventario.fragment.aside') 
</div>
</div> 
<div class="col-md-12 table-responsive" style="text-align:center" >
<table class="table table-hover">
    <thead>
        <tr>
   
        <th class="text-center">Codigo</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">Cantidad</th>
        <th class="text-center">Precio Unitario</th>
        <th class="text-center">Precio Venta</th>
        <th class="text-center">Stock minimo </th>
        <th class="text-center">Fecha vencimiento </th>
        </tr>
        </thead>
    <tbody>
        @foreach ($detalles as $articulo)
       <tr   id="tr"
       onmouseover="return fechavencimiento()";
      
       @if($articulo->cantidad <= $articulo->stockmin)
       
       style="background-color:#EF5350;"

       @endif
       
       >
    
       <td class="text-center">{{$articulo->codigo}}</td>
       <td class="text-center">{{$articulo->nombre}}</td>
       <td class="text-center">{{$articulo->cantidad}}</td>
       <td class="text-center">{{$articulo->preciounitario}}</td>
       <td class="text-center">{{$articulo->precioventa}}</td>
       <td class="text-center">{{$articulo->stockmin}}</td>
       <td class="text-center">{{$articulo->fechavencimiento}}</td>
       </tr>
       @endforeach
        </tbody>
</table>

</div>
</div>
</div>
</div>

@endsection
