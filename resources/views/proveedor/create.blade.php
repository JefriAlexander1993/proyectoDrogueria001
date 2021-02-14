@extends('layouts.app3')
@section('content')
<div class="row">
    <div class="col-sm-9">
        <strong>Crear proveedor</strong>
    </div>
    <div class="col-sm-3">
         <strong>Listado de proveedores:<a href="{{route('proveedor.index')}}" class="btn btn-sm  btn-block btn-warning"><i class="fa fa-list-alt" aria-hidden="true"></i></a></strong>
    </div>
</div>
<hr>
{!!Form::open(['route'=>'proveedor.store'])!!}
@include('proveedor.fragment.form')
<!--Incluyo el formulario-->
{!!Form::close()!!}

@endsection


