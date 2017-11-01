@extends('layouts.apphome')
@section('content')
<div class="col-md-3">
@include('compra.fragment.error')
</div>

 <div class="panel1 panel-default1">
      <div class="panel-heading"><strong>Editar compra.</strong>&nbsp;&nbsp;<a href="{{route('compra.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>
   
     </div>
<div class="panel-body">
<div class="col-md-12">
<<<<<<< HEAD
{!!Form::model($compra,['route'=>['compra.update', $compra->id], 'method'=>'PUT']) !!}<!--Se le pasa, la variable del metodo-->
=======
{!!Form::model($compras,['route'=>['compra.update', $compras->id], 'method'=>'PUT']) !!}<!--Se le pasa, la variable del metodo-->
>>>>>>> f1ed23d7815e804265035c3f93658fe94b9ba3e3
@include('compra.fragment.form') <!--Incluyo el formulario-->
{!!Form::close()!!}
</div>
</div>
</div>
@endsection


