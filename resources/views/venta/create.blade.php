@extends('layouts.apphome')
@section('content')
<div class="col-sm-12">
@include('venta.fragment.error')
</div>

<div class="panel  panel-success">
      <div class="panel-heading"><strong>Crear un nuevo venta.</strong>&nbsp;&nbsp;<a href="{{route('venta.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>
      </div>
<div class="panel-body">
<div class="col-md-12">

{!!Form::open(['route'=>'venta.store'])!!}<!--Se le pasa, la variable del metodo-->
@include('venta.fragment.form') <!--Incluyo el formulario-->

{!!Form::close()!!}

</div>
</div>
</div>

@endsection