@extends('layouts.apphome')
@section('content')

 <div class="panel1 panel-primary">
      <div class="panel-heading"><strong>Infirmación de la caja.</strong>&nbsp;&nbsp;&nbsp;<a href="{{route('caja.edit', $caja->id)}}" class="btn btn-default"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
      <a href="{{route('caja.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>  

</div>
<div class="panel-body">
<div class="col-md-12">
<p>Identificacion:&nbsp;{{$caja->id}}</p> <!-- id de la caja-->
<p>Nombre del usuario de la caja:&nbsp;{{$caja->nombreUsuario}}</p><!-- Nombre usuario caja-->
<p>Valor inicial:&nbsp;{{$caja->valorInicial}}</p> <!-- Valor inicial-->
<p>Valor final:&nbsp;{{$caja->valorFinal}}</p> <!-- Valor final-->
<p>Ganancia:&nbsp;{!!$caja->ganancia!!}</p> <!-- Ganancia del dia-->

</div>
</div>
</div>





@endsection