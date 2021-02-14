@extends('layouts.app3')
@section('content')

<strong>LISTADO DE VENTAS.</strong>
<hr>
<div class="row">
    <div class="col-sm-3">
        <strong>Crear venta:</strong> <a class="btn btn-success btn-block btn-xs" href="{{route('venta.create')}}" title="Crear una venta"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>

    </div>
    <div class="col-sm-3">
        <strong>Generar pdf:</strong>
        <a href="{{url('/ventapdf')}}" target="_blank" class="btn btn-danger btn-block btn-xs" title="Generar pdf de ventas"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
    </div>
    <div class="col-sm-6">
        @include('venta.fragment.aside')
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        {!!Form:: label('totalventa','Total de ventas:')!!}
    </div>
    <div class="col-sm-10">
        <input class="form-control text-center" disabled value="<?php echo $sumVenta?>" type="text">
    </div>
</div>
<hr>
<div class="col-md-12 table-responsive">
    <table class="table table-bordered" style="width:100%" id="venta_id">
        <thead>
            <tr>
                <th class="text-center">#Factura</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Total</th>
                <th class="text-center">Generar factura</th>
                <th class="text-center">Ver</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
            <tr>
                <td align="center">{{$venta->id}}</td>
                <td align="center">{{$venta->created_at}}</td>
                <td align="center">{{$venta->totalventa}}</td>
                <td align="center"><a class="btn btn-sm btn-warning" target="_blank" href="{{route('facturapdf', $venta->id)}}"><i class="fa fa-file-text" aria-hidden="true"></i></a></td>
                <td align="center"> <a href="{{route('venta.show', $venta->id)}}" class="btn btn-sm btn-ligth"><i class="fa fa-eye" aria-hcodigoden="true"></i></a></td>
                <td align="center"> <a href="{{route('venta.edit', $venta->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit" aria-hcodigoden="true"></i></a></td>
                <td align="center">
                    <form action="{{route('venta.destroy', $venta->id)}}" method="POST">
                        {{csrf_field()}}
                        <!--Toque para que sea eliminado por la aplicacion-->
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

