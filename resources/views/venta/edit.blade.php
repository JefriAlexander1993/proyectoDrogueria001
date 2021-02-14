@extends('layouts.app3')
@section('content')

<div class="row">
    <div class="col-10">
        <strong>EDITAR VENTA.</strong>
    </div>
    <div class="col-2">
        <h5 class="card-title"><strong>Listado de venta:</strong>
            <a href="{{route('venta.index')}}" class="btn btn-warning btn-block btn-xs" title="Listado de ventas"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
        </h5>
    </div>
</div>

{!!Form::model($venta,['route'=>['venta.update', $venta->id], 'method'=>'PUT']) !!}
<!--Se le pasa, la variable del metodo-->
{{csrf_field()}}
@include('venta.fragment.formEdit')
<!--Incluyo el formulario-->
{!!Form::close()!!}


@endsection

