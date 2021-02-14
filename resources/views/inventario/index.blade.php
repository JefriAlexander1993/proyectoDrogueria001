@extends('layouts.app3')
@section('content')

        <div class="row">
            <div class="col-sm-6"><strong>Inventario</strong></div>
            <div class=" col-sm-3">
                <strong>Agregar compra:</strong>
                 <a href="{{route('compra.create')}}" target="_blank" class="btn btn-xs btn-block btn-success" title="Agregar productos."><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>
            <div class=" col-sm-3">
                <strong>Genera pdf:</strong>
                <a href="{{url('/articulopdf')}}" target="_blank" class="btn btn-xs btn-block btn-danger" title="Generar pdf de inventario."><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                </div>
        </div>
        <hr>
        <div class="col-sm-12 table-responsive-sm">
            <table class="table table-hover" id="inventario_id">
                <thead>
                    <tr>
                        <th class="text-center">Codigo</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Precio Unitario</th>
                        <th class="text-center">Precio Venta</th>
                        <th class="text-center">Stock minimo </th>
                        <th class="text-center">Fecha vencimiento </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalles as $articulo)
                    <tr @if($articulo->cantidad <= $articulo->stockmin)

                            style="background-color:#e3342f;color:#fff"

                            @endif

                            >

                            <td class="text-center">{{$articulo->codigo}}</td>
                            <td class="text-center">{{$articulo->nombre}}</td>
                            <td class="text-center">{{$articulo->cantidad}}</td>
                            <td class="text-center">{{$articulo->preciounitario}}</td>
                            <td class="text-center">{{$articulo->precioventa}}</td>
                            <td class="text-center">{{$articulo->stockmin}}</td>
                            <td class="text-center">{{$articulo->fechavencimiento}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection

