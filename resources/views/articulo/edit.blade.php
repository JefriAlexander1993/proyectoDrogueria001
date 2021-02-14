@extends('layouts.app3')
@section('content')
<div class="row">
    <div class="col-sm-10">
        <strong>Editar un articulo.</strong>
    </div>
    <div class="col-sm-2">

        <strong>Listado articulo:</strong>
        <a href="{{route('articulo.index')}}" class="btn btn-xs btn-block btn-warning"><i class="fa fa-list-alt" aria-hidden="true"></i></a>

    </div>
</div>
<hr>
{!!Form::model($articulo,['route'=>['articulo.update', $articulo->id], 'method'=>'PUT']) !!}
<!--Se le pasa, la variable del metodo-->
@include('articulo.fragment.form')
<!--Incluyo el formulario-->
{!!Form::close()!!}


@endsection

