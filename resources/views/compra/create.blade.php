@extends('layouts.app3')
@section('content')

<div class="row">
    <div class="col-sm-10">
        <strong>CREAR COMPRA.</strong>
    </div>
    <div class="col-sm-2">
        <strong>Ir al listado de compra:</strong>
        <a href="{{route('compra.index')}}" class="btn btn-xs btn-block btn-warning"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
    </div>
</div>

<hr>
{!!Form::open(['route'=>'compra.store'])!!}
<!--Se le pasa, la variable del metodo-->
@include('compra.fragment.form')
<!--Incluyo el formulario-->
{!!Form::close()!!}
@endsection
