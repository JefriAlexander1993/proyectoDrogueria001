@extends('layouts.app3')

@section('content')
<div class="row">
    <div class="col-sm-8"><strong>VER PERMISO.</strong></div>
    <div class="col-sm-2">
        <strong>Ir a listado permisos:</strong>
        <a href="{{route('permission.index')}}" class="btn btn-xs btn-block btn-warning " title="Lista der permisos"><i class="fa fa-list-alt"></i></a>
    </div>
    <div class="col-sm-2">
        <strong>Editar permiso:</strong>
        <a href="{{ route('permission.edit', $permission->id)}}" class="btn btn-primary btn-block btn-xs" title="Editar permiso"> <i class="fa fa-edit"></i></a>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <p><b> Nombre: </b>{{ $permission->namep }}</p>
    </div>

    <div class="col-sm-4">
        <p><b>Nombre a mostrar: </b>
            {{ $permission->display_name }}
        </p>
    </div>

    <div class="col-sm-4">
        <p><b>Descripción: </b>
            {{ $permission->description }}
        </p>
    </div>
</div>

@endsection


