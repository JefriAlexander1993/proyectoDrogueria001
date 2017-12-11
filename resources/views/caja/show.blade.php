@extends('layouts.apphome')
@section('content')

 <div class="panel1 panel-primary">
      <div class="panel-heading"><strong>Infirmación de la caja.</strong>&nbsp;&nbsp;&nbsp;
      <a href="{{route('caja.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>  

</div>
<div class="panel-body">
<div class="col-md-12">
<p>Identificacion:&nbsp;{{$caja->id}}</p> <!-- id de la caja-->
<p>Nombre del usuario de la caja:&nbsp;{{$caja->nombreusuario}}</p><!-- Nombre usuario caja-->
<p>Valor inicial:&nbsp;{{$caja->valorinicial}}</p> <!-- Valor inicial-->
<p>Valor final:&nbsp;{{$detalles->valorfinal}}</p> <!-- Valor final-->
<p>Ganancia:&nbsp;{!!$detalles->ganancia!!}</p> <!-- Ganancia del dia-->

</div>
</div>
</div>





@endsection