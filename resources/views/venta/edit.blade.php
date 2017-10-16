@extends('layouts.apphome')
@section('content')
<div class="col-md-3">
@include('venta.fragment.error')
</div>

 <div class="panel1 panel-default1">
      <div class="panel-heading">Editar venta.&nbsp;&nbsp;<a href="{{route('venta.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>
     </div>
<div class="panel-body">
<div class="col-md-12">
{!!Form::model($venta,['route'=>['venta.update', $venta->id], 'method'=>'PUT']) !!}<!--Se le pasa, la variable del metodo-->
@include('venta.fragment.form') <!--Incluyo el formulario-->
{!!Form::close()!!}
</div>
</div>
</div>
@endsection
