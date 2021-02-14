@extends('layouts.app3')
@section('content')

<div class="row">
    <div class="col-sm-10">
        <strong>Información de la compra.</strong>
    </div>
    <div class="col-sm-2">
        <strong>Listado de compras.</strong>
        <a href="{{route('compra.index')}}" class="btn btn-block btn-warning "><i class="fa fa-list-alt" aria-hidden="true"></i></a>
    </div>
</div>
<hr>
<div class="table-responsive-sm">
    <table class="table" id="table-show-purchase">
        <thead>
            <tr>

                <th class="text-center">Codigo del producto</th>
                <th class="text-center">Nombre</th>
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
                <td align="center">{{$detalle->nombre}}</td><!-- Descritdcion corta-->
                <td align="center">{{$detalle->cantidad}}</td><!-- Descritdcion corta-->
                <td align="center">{{$detalle->preciounitario}}</td> <!-- Descritdcion larga y se va intertdretar-->
                <td align="center">{{$detalle->subtotal}}</td> <!-- Descritdcion larga y se va intertdretar-->
                <td align="center">{{$detalle->total}}</td> <!-- Descritdcion larga y se va intertdretar-->
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
<hr>
<br>
<div class="row">
    <div class="col-sm-10"><strong>Total compra:</strong></div>
    <div class="col-sm-2"><b>$ {{$totalcompra}}</b></div>
</div>

@endsection

