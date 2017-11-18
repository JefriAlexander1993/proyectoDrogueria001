@extends('layouts.apphome')
@section('content')

<div class="panel1  panel-success">
      <div class="panel-heading"><strong>Crear un nuevo proveedor.</strong>&nbsp;&nbsp;
      @role('admin')
      <a href="{{route('proveedor.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>
      @endrole
      </div>
<div class="panel-body">
<div class="col-md-12">

{!!Form::open(['route'=>'proveedor.store'])!!}<!--Se le pasa, la variable del metodo-->
@include('proveedor.fragment.form') <!--Incluyo el formulario-->
{!!Form::close()!!}

</div>
</div>
</div>

@endsection
