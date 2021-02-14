@extends('layouts.app3')
@section('content')

<div class="row">
    <div class="col-10">
        <strong>CREAR CREDITO.</strong>
    </div>
    <div class="col-2">
        <h5 class="card-title"><strong>Listado de  creditos:</strong>
            <a href="{{route('credito.index')}}" class="btn btn-warning btn-block btn-xs" title="Listado de creditos"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
          
        </h5>
    </div>
</div>
        {{-- <h5 class="card-title"><strong>Acciones:</strong>
            <a href="{{route('credito.index')}}" class="btn btn-ligth btn-xs" title="Listado de creditos"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
            <a data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-link btn-sm" title="Crear un cliente"><i class="fa fa-user"></i></a>
        </h5> --}}
        <hr>

        {!!Form::open(['route'=>'credito.store'])!!}
        <!--Se le pasa, la variable del metodo-->
        @include('credito.fragment.form')
        <!--Incluyo el formulario-->
        {!!Form::close()!!}
 
@endsection
