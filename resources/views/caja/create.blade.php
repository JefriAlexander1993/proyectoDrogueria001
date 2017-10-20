@extends('layouts.apphome')
@section('content')
<div class="col-sm-12">
@include('caja.fragment.error')
</div>

<div class="panel1  panel-success">
      <div class="panel-heading"><strong>Crear una nueva caja.</strong>&nbsp;&nbsp;<a href="{{route('caja.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>
      </div>
<div class="panel-body">
<div class="col-md-12">

{!!Form::open(['route'=>'caja.store'])!!}<!--Se le pasa, la variable del metodo-->
<br>
<br>
@include('caja.fragment.form') <!--Incluyo el formulario-->

{!!Form::close()!!}

</div>
</div>
</div>

@endsection