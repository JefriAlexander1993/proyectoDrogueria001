@extends('layouts.app3')
@section('content')

<strong>CREAR VENTA.</strong>
<hr>
<div class="row">
    <div class="col-sm-6">
        <strong>Ir al listado de venta:</strong>
        <a href="{{route('venta.index')}}" class="btn btn-block btn-warning btn-xs" title="Listado de ventas"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
    </div>
    <div class="col-sm-6">
        <strong class="text-center">Crear cliente:</strong>
        <a data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-block btn-primary btn-xs" title="Crear un cliente"><i class="fa fa-user"></i></a>

    </div>

</div>

{!!Form::open(['route'=>'venta.store','id'=>'formsale','method'=>'POST'])!!}
<!--Se le pasa, la variable del metodo-->
{{csrf_field()}}
@include('venta.fragment.form')
<!--Incluyo el formulario-->
{!!Form::close()!!}
@include('venta.fragment.modal')
</div>
</div>
@endsection

