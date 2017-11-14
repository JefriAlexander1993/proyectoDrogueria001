@extends('layouts.apphome')
@section('content')
<div class="col-sm-12">
@include('compra.fragment.error')
</div>

<div class="panel1  panel-success">
      <div class="panel-heading"><strong>Crear una nueva compra.</strong>&nbsp;&nbsp;<a href="{{route('compra.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>
      </div>
<div class="panel-body">
<div class="col-md-12">

{!!Form::open(['route'=>'compra.store'])!!}<!--Se le pasa, la variable del metodo-->
@include('compra.fragment.form') <!--Incluyo el formulario-->

{!!Form::close()!!}

</div>
</div>
</div>

@endsection