@extends('layouts.app3')

@section('content')
<div class="card  col-sm-12" style="margin-left:auto;">
    <div class="titulo-contenido "><strong>EDITAR ASIGNACION DE ROL A USUARIO</strong></div>
    <div class="card-body t">

        <strong>Acción:</strong>
        <a href="{{route('role_user.index')}}" class="btn btn-xs btn-default "><i class="fas fa-angle-left"></i></a>
        <hr>

        {!! Form::model($role_user, ['route' => ['role_user.update', $role_user->id], 'method' => 'PUT']) !!}

        @include('Admin.Role_users.fragment.form')

        {!! Form::close() !!}
    </div>
</div>

@endsection
