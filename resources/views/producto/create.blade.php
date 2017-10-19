@extends('layouts.apphome')
@section('content')

<div class="panel1  panel-success">
<div class="panel-heading"><strong>Crear un nuevo producto.</strong>&nbsp;&nbsp;<a href="{{route('producto.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>
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