@extends('layouts.app3')
@section('content')
<div class="row">
    <div class="col-sm-10">
        <strong>CREAR CLIENTE</strong>
    </div>
    <div class="col-sm-2">
        <strong>ir a listado cliente:</strong>
        <a href="{{route('cliente.index')}}" class="btn btn-warning btn-block btn-xs" title="Listado de clientes"><i class="fas fa-list-alt"></i></a></a>
    </div>
</div>
<hr>

<strong>Acción:</strong>
<a href="{{route('cliente.index')}}" class="btn btn-ligth btn-xs" title="Listado de clientes"><i class="fas fa-angle-left"></i></a>

{!!Form::open(['route'=>'cliente.store','method'=>'POST'])!!}
<!--Se le pasa, la variable del metodo-->
@include('cliente.fragment.form')
<!--Incluyo el formulario-->
{!!Form::close()!!}

@endsection

