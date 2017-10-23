@extends('layouts.apphome')
@section('content')

<div class="panel1  panel-success">
<div class="panel-heading"><strong>Crear una nueva compra.</strong>&nbsp;&nbsp;<a href="{{route('compra.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>
</div>
<div class="panel-body">
<div class="col-md-12">
<!-- @permmisions('store') -->
{!!Form::open(['route'=>'compra.store'])!!}<!--Se le pasa, la variable del metodo-->
@include('compra.fragment.form') <!--Incluyo el formulario-->
{!!Form::close()!!}
<!-- @endpermmisions -->
</div>
</div>
</div>
@endsection