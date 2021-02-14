@extends('layouts.app3')
@section('content')
<strong>LISTADO DE COMPRAS.</strong>
<hr>
<div class="row">
    <div class="col-sm-3">
        <strong>Crear compra: </strong>
        <a class="btn btn-success btn-block btn-xs" href="{{route('compra.create')}}" title="Crear compra"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>

    </div>
    <div class="col-sm-3">
        <strong>Generar pdf: </strong>
        <a href="{{url('/comprapdf')}}" target="_blank" class="btn btn-danger btn-block btn-xs" title="Generar pdf de compras"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>

    </div>
    <div class="col-sm-6">
        @include('compra.fragment.aside')
    </div>
</div>

<div class="col-md-12 table-responsive-sm">
    <table class="table table-hover " id="compra_id">
        <thead>
            <tr>
                <th class="text-center"># de Compra</th>
                <th class="text-center">Fecha Compra</th>
                <th class="text-center">Total Compra</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Ver</th>
                <th class="text-center">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compras as $compra)
            <tr>
                <td class="text-center">{{$compra->id}}</td>
                <td class="text-center">{{$compra->created_at}}</td>
                <td class="text-center">{{$compra->totalCompra}}</td>
                <td class="text-center"><a href="{{route('compra.show', $compra->id)}}" class="btn btn-default btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                <td class="text-center"><a href="{{route('compra.edit', $compra->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></i></a></td>

                <td class="text-center">
                    <form action="{{route('compra.destroy', $compra->id)}}" method="POST">
                        {{csrf_field()}}
                        <!--Toque para que sea eliminado por la aplicacion-->
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

