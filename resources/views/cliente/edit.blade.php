@extends('layouts.app3')
@section('content')
<div class="row">
    <div class="col-sm-10">
        <strong>EDITAR CLIENTE</strong>
    </div>
    <div class="col-sm-2">
        <strong>ir a listado cliente:</strong>
        <a href="{{route('cliente.index')}}" class="btn btn-warning btn-block btn-xs" title="Listado de clientes"><i class="fas fa-list-alt"></i></a></a>
    </div>
</div>
<hr>
{!!Form::model($cliente,['route'=>['cliente.update', $cliente->id], 'method'=>'PUT']) !!}
<!--Se le pasa, la variable del metodo-->
@include('cliente.fragment.form')
<!--Incluyo el formulario-->
{!!Form::close()!!}

@endsection

