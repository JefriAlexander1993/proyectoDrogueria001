@extends('layouts.apphome')
@section('content')
<div class="col-md-3">
@include('articulo.fragment.error')
</div>

 <div class="panel1 panel-default1">
      <div class="panel-heading"><strong>Editar articulo.</strong>&nbsp;&nbsp;<a href="{{route('articulo.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>
   
     </div>
<div class="panel-body">
<div class="col-md-12">
{!!Form::model($articulo,['route'=>['articulo.update', $articulo->id], 'method'=>'PUT']) !!}<!--Se le pasa, la variable del metodo-->
@include('articulo.fragment.form') <!--Incluyo el formulario-->
{!!Form::close()!!}
</div>
</div>
</div>
@endsection
