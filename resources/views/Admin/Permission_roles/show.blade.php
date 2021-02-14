@extends('layouts.app3')

@section('content')

<div class="row">
    <div class="col-sm-6"><strong>VER ASIGNACION DEL PERMISO.</strong></div>
    <div class="col-sm-3">
        <strong>Ir a listado de permisos asignados:</strong>
        <a href="{{route('permission_role.index')}}" class="btn btn-xs btn-block btn-warning "><i class="fa fa-list-alt" aria-hidden="true"></i></a>
    </div>
    <div class="col-sm-3">
        <strong>Editar permisos asignados:</strong>
        <a href="{{ route('permission_role.edit', $permission_role->id)}}" class="btn btn-block btn-primary btn-xs " title="Editar producto"> <i class="fa fa-edit"></i></a>
    </div>
</div>
<hr>
<p><b> Id del permiso: </b>{{ $permission->namep }}</p>

<p><b> Id del rol:</b>
    {{ $role->name }}


    @endsection

