@extends('layouts.apphome')
@section('content')
<div class="col-md-3">
@include('cliente.fragment.error')
</div>

 <div class="panel1 panel-default1">
      <div class="panel-heading"><strong>Editar cliente.</strong>&nbsp;&nbsp;<a href="{{route('cliente.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>
   
     </div>
<div class="panel-body">
<div class="col-md-12">
{!!Form::model($cliente,['route'=>['cliente.update', $cliente->id], 'method'=>'PUT']) !!}<!--Se le pasa, la variable del metodo-->
@include('cliente.fragment.form') <!--Incluyo el formulario-->
{!!Form::close()!!}
</div>
</div>
</div>
@endsection
