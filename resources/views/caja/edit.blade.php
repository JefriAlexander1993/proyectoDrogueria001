@extends('layouts.apphome')
@section('content')
<div class="col-md-3">
@include('caja.fragment.error')
</div>

 <div class="panel1  panel-default">
      <div class="panel-heading"><strong>Editar caja.</strong>&nbsp;&nbsp;<a href="{{route('caja.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>
      </div>
<div class="panel-body">
<div class="col-md-12">
{!!Form::model($caja,['route'=>['caja.update', $caja->id], 'method'=>'PUT']) !!}<!--Se le pasa, la variable del metodo-->
@include('caja.fragment.formCierre') <!--Incluyo el formulario-->
{!!Form::close()!!}
</div>
</div>
</div>
@endsection


