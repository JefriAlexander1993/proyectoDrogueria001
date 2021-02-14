@extends('layouts.app3')
@section('content')
<div class="row">
    <div class="col-sm-9">
        <strong>Editar proveedor</strong>
    </div>
    <div class="col-sm-3">
        <strong>Listado de proveedores:<a href="{{route('proveedor.index')}}" class="btn btn-sm  btn-block btn-warning"><i class="fa fa-list-alt" aria-hidden="true"></i></a></strong>
    </div>
</div>
<hr>
{!!Form::model( $proveedor,['route'=>['proveedor.update', $proveedor->id], 'method'=>'PUT']) !!}
<!--Se le pasa, la variable del metodo-->
@include('proveedor.fragment.form')
<!--Incluyo el formulario-->
{!!Form::close()!!}
@endsection


