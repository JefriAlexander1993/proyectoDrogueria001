@extends('layouts.app3')

@section('content')
<div class="row">
    <div class="col-sm-6">
        <strong>VER ASIGNACION DE ROL A USUARIO</strong>
    </div>
    <div class="col-sm-3">
        <strong>Listado de asignación de rol:</strong>
        <a href="{{route('role_user.index')}}" class="btn btn-xs btn-block btn-warning" title="Listado Asignacion de rol a usuario"><i class="fa fa-list-alt"></i></a>

    </div>

    <div class="col-sm-3">
        <strong>Editar asignación de rol:</strong>
        <a href="{{ route('role_user.edit', $role_user->id)}}" class="btn btn-primary btn-block btn-xs" title="Editar Asignacion de rol a usuario"> <i class="fa fa-edit"></i></a>
    </div>
</div>

<hr>

<p><b> Nombre del usuario: </b>{{ $user->name_user }}</p>

<p><b> Nombre del rol:</b>
    {{ $role->name }}

    @endsection

