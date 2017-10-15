@extends('layouts.apphome')
@section('content')
<div class="col-sm-12">
@include('producto.fragment.error')
</div>

<div class="panel1  panel-success">
      <div class="panel-heading">
      <h2>Crear un nuevo producto.</h2>&nbsp;&nbsp;<a href="{{route('producto.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>
      </div>
<div class="panel-body">
<div class="col-md-12">

{!!Form::open(['route'=>'producto.store'])!!}<!--Se le pasa, la variable del metodo-->
@include('producto.fragment.form') <!--Incluyo el formulario-->

{!!Form::close()!!}

</div>
</div>
</div>

@endsection