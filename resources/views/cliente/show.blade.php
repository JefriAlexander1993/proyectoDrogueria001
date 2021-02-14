@extends('layouts.app3')
@section('content')

<div class="row">
    <div class="col-sm-8">
        <strong>INFORMACION DEL CLIENTE</strong>
    </div>
    <div class="col-sm-2">
        <strong>Editar cliente:</strong>
        <a href="{{route('cliente.edit', $cliente->id)}}" class="btn btn-primary btn-xs btn-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
    </div>
    <div class="col-sm-2">
        <strong>Ir a lista de cliente:</strong>
        <a href="{{route('cliente.index')}}" class="btn  btn-warning btn-xs btn-block"><i class="fas fa-list-alt"></i></a>
    </div>


</div>
<hr>
<div class="row">
    <div class="col-sm-3">
        <p><strong>Primer nombre:&nbsp;</strong>{{$cliente->primer_nombre}}</p> <!-- Imprimir el nombre del cliente-->

    </div>
    
    <div class="col-sm-3">
        <p><strong>Segundo nombre:&nbsp;</strong>{{$cliente->segundo_nombre}}</p> <!-- Imprimir el nombre del cliente-->

    </div>
    
    <div class="col-sm-3">
        <p><strong>Primer apellido:&nbsp;</strong>{!!$cliente->primer_apellido!!}</p> <!-- Correo electronico del cliente-->
    </div>
    
    <div class="col-sm-3">
        <p><strong>Segundo apellido:&nbsp;</strong>{!!$cliente->segundo_apellido!!}</p> <!-- Correo electronico del cliente-->

    </div>
       
</div>
<div class="row"><div class="col-sm-3">
    <p><strong>Correo Electronico:&nbsp;</strong>{!!$cliente->correoelectronico!!}</p> <!-- Correo electronico del cliente-->

</div></div>


@endsection

