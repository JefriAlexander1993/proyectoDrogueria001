@extends('layouts.app3')
@section('content')
<div class="row">
    <div class="col-sm-8"><strong>Ver un abono.</strong></div>
    <div class="col-sm-2"><strong>Editar abono</strong>
        <a href="{{route('abono.edit', $client_manure->id)}}" class="btn btn-xs btn-block btn-primary" title="Editar articulo"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
    </div>
    <div class="col-sm-2">
        <strong>Listar abono</strong>
        <a href="{{route('abono.index')}}" class="btn btn-xs btn-block btn-warning" title="Listado de articulos"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
    </div>
</div>
<hr>
<h6 class="text-center"><b>Información del abono</b></h6>
<hr>
<div class="table-responsive-sm">
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">
                    Nombres de cliente
                </th>             
                <th class="text-center">
                    Apellidos de cliente
                </th>
                <th class="text-center">
                    Saldo actual
                </th>
                           
                <th class="text-center">
                    Valor de abono
                </th>
                <th class="text-center">
                    # Cuota
                 </th>
                <th class="text-center">
                    Cuotas restantes
                </th>

           

            </tr>
        </thead>
        {{-- cliente_abonos.saldo_actual','cliente_abonos.cuotas_restantes','clientes.primer_nombre',
    'clientes.segundo_nombre','clientes.primer_apellido','clientes.segundo_apellido',
    clientes.nuip','abonos.id','abonos.valor_abono','abonos.cuota_numero' --}}
        <tbody>
            <tr>
                <td align="center">{{ $client_manure->primer_nombre }} {{ $client_manure->segundo_nombre }}</td>
                <td align="center">{{ $client_manure->primer_apellido }} {{ $client_manure->segundo_apellido }}</td>
                <td align="center">{{ $client_manure->saldo_actual }}</td>
                <td align="center">{{ $client_manure->valor_abono }} </td>
                <td align="center">{{ $client_manure->cuota_numero }} </td>
                <td align="center">{{ $client_manure->cuotas_restantes }}</td>
              
                
            </tr>
        </tbody>
    </table>
</div>
@endsection
