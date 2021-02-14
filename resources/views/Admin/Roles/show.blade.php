@extends('layouts.app3')

@section('content')
<div class="row">
    <div class="col-sm-8">
        <strong>VER ROL</strong>
    </div>
    <div class="col-sm-2">
        <strong>Ir listado de roles:</strong>
        <a href="{{route('role.index')}}" class="btn btn-xs btn-block btn-warning " title="Listado de roles"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
    </div>
    <div class="col-sm-2">
        <strong>Editar rol:</strong>
        <a href="{{route('role.edit',$role->id)}}" class="btn btn-xs btn-block btn-primary " title="Editar rol"><i class="fas fa-edit"></i></a>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <p><b> Nombre: </b>{{ $role->name }}</p>
    </div>

    <div class="col-sm-4">
        <p><b>Nombre a mostrar: </b>
            {{ $role->display_name }}
        </p>
    </div>

    <div class="col-sm-4">
        <p><b>Descripción: </b>
            {{ $role->description }}
        </p>
    </div>
</div>
@endsection


