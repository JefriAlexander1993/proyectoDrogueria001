@extends('layouts.app3')
@section('content')
<div class="col-sm-12">
	<strong>CREAR ABONO<strong>
</div>
<hr>
<div class="row">
	<div class="col-sm-10"></div>
		<div class="col-sm-2">
			<strong>Ir a listado de abono</strong>
			<a href="{{route('abono.index')}}" class="btn btn-xs btn-block btn-warning"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
		</div>
</div>
{!!Form::open(['route'=>'abono.store'])!!}<!--Se le pasa, la variable del metodo-->
			@include('abono.fragment.form') <!--Incluyo el formulario-->
	{!!Form::close()!!}
@endsection