@extends('layouts.app3')

@section('content')
<div class="row">
    <div class="col-sm-6"><strong>VER USUARIO.</strong></div>
    <div class="col-sm-3">
        <strong>Ir a listado de usuarios:</strong>
        <a href="{{route('user.index')}}" class="btn btn-xs btn-block btn-warning" title="Listado de usuarios"><<i class="fa fa-list-alt" aria-hidden="true"></i></a>
    </div>
    <div class="col-sm-3">
        <strong>Editar usuario:</strong>
        <a href="{{route('user.edit',$user->id)}}" class="btn btn-xs btn-block btn-primary" title="Editar de usuario"><i class="fas fa-edit"></i></a>
    </div>
</div>
<hr>
<div class="row">
	<div class="col-sm-3">
        <p><b>Usuario n°:</b> {{ $user->id }}</p>
    </div>
	<div class="col-sm-3">
        <p><b>Nombres:</b> {{ $user->name_user }}</p>
    </div>
    <div class="col-sm-3">
        <p><b>Apellidos:</b> {{ $user->lastname }}</p>
    </div>
    <div class="col-sm-3">
        <p><b>Nuip:</b> {{ $user->nuip }}</p>
    </div>
 
</div>
<div class="row">
	<div class="col-sm-3">
        <p><b>Fecha de nacimiento:</b> {{ $user->date_birth}}</p>
    </div>
    <div class="col-sm-3">
        <p><b>Dirección:</b> {{ $user->address}}</p>
    </div>
    <div class="col-sm-3">
        <p><b>Teléfono:</b> {{ $user->phone}}</p>
    </div>
    <div class="col-sm-3">
        <p><b>Email:</b> {{ $user->email}}</p>
    </div>
</div>

@endsection


