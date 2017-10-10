@extends('layouts.apphome')
@section('content')
<div class="col-md-3">
@include('producto.fragment.error')
</div>

 <div class="panel  panel-default">
      <div class="panel-heading"><strong>Editar producto.</strong>&nbsp;&nbsp;<a href="{{route('producto.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>
      </div>
<div class="panel-body">
<div class="col-md-12">
{!!Form::model($product,['route'=>['producto.update', $product->id], 'method'=>'PUT']) !!}<!--Se le pasa, la variable del metodo-->
@include('producto.fragment.form') <!--Incluyo el formulario-->
{!!Form::close()!!}
</div>
</div>
</div>
@endsection


