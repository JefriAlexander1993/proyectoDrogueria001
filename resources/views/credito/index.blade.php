@extends('layouts.app3')
@section('content')
<strong>LISTADO DE CREDITOS.</strong><hr>
        <div class="row">
            <div class="col-sm-3">
                <strong>Crear credito</strong>
                    <a class="btn btn-success btn-xs btn-block" href="{{route('credito.create')}}" title="Crear credito"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
 
            </div>
            <div class="col-sm-3">
               <strong>Generar pdf</strong>
                    <a href="{{url('/creditopdf')}}" target="_blank" class="btn btn-danger btn-xs btn-block"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
              
            </div>
            <div class="col-sm-6">
                @include('credito.fragment.aside')
            </div>
        </div>
        <br />
        <div class="table-responsive-sm">
            <table class="table table-striped table-bordered" id="credito_id">
                <thead>
                    <tr>
                        <th class="text-center">Nuip</th>
                        <th class="text-center">Valor de credito</th>
                        <th class="text-center">Saldo actual</th>
                        <th class="text-center">Cuotas</th>
                        <th class="text-center">Valor de cuota</th>
                        <th class="text-center">Forma de pago</th>
                        <th class="text-center">Observación</th>
                        <th class="text-center">Ver</th>
                        <th class="text-center">Editar</th>
                        <th class="text-center">Eliminar</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($creditos as $credito)
                    <tr>

                        <td align="center">
                            {{ $credito->nuip}}</td>
                        <td align="center">{{$credito->total_credito}}</td>
                        <td align="center">{{$credito->saldo_actual}}</td>
                        <td align="center">
                            {{$credito->cantidad_de_cuotas}}
                        </td>
                        <td align="center">{{$credito-> valor_de_cuota}}</td>
                        <td align="center">{{$credito->forma_de_pago}}</td>
                        <td align="center">{{$credito->observacion}}</td>
                        <td align="center"> <a href="{{route('credito.show', $credito->id)}}" class="btn btn-xs btn-ligth"><i class="fa fa-eye" aria-hcodigoden="true"></i></a></td>
                        <td align="center"> <a href="{{route('credito.edit', $credito->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-edit" aria-hcodigoden="true"></i></a></td>
                        <td align="center">
                            <form action="{{route('credito.destroy', $credito->id)}}" method="POST">
                                {{csrf_field()}}
                                <!--Toque para que sea eliminado por la aplicacion-->
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            </form>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>

@endsection

