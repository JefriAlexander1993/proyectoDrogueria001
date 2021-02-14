@extends('layouts.app3')
@section('content')

<h4 class="text-center"><strong>INFORMACION DE VENTA.</strong></h4>
<div class="row">
    <div class="col-sm-3">
        <p align="center" style="color: red"><strong>Numero de venta</strong><br> {{$venta->id}}</p>

    </div>
    <div class="col-sm-3">
        <p align="center" style="color: red"><strong>Fecha de venta</strong><br> {{$venta->created_at}}</p>

    </div>

    <div class="col-sm-3">
        <p align="center" style="color: red"><strong>Total de la venta</strong><br> {{$venta->totalventa}}</p>

    </div>
    <div class="col-sm-3">
        <strong>Ir a listado de venta:</strong>
        <a href="{{route('venta.index')}}" class="btn btn-block btn-warning btn-xs" title="Listado de ventas"><i class="fa fa-list-alt"></i></a>

    </div>


</div>
<hr>
<div class="table-responsive-sm">
    <table class="table table-hover" id="venta_id">
        <thead>
            <tr>
                <th class="text-center">Codigo </th>
                <th class="text-center">Nombre </th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Precio unitario</th>
                <th class="text-center">Subtotal</th>
                <th class="text-center">Total</th>

            </tr>
        </thead>
        <tbody>
            @foreach($detalles as $detalle)
            <tr>
                <td align="center">{{$detalle->codigo}}</td>
                <td align="center">{{$detalle->nombre}}</td>
                <td align="center">{{$detalle->cantidad}}</td>
                <td align="center">{!!$detalle->preciounitario!!}</td>
                <td align="center">{!!$detalle->subtotal!!}</td>
                <td align="center">
                    {!!$detalle->total!!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection

