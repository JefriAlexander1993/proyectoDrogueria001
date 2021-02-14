@extends('layouts.app3')

@section('content')

<div class="row">
    <div class="col-sm-9"><strong>CREAR ASIGNACION DE ROL A USUARIO</strong>
    </div>
    <div class="col-sm-3"><strong>Listado asignación del rol:</strong>
        <a href="{{route('role_user.index')}}" class="btn btn-xs btn-block btn-warning "><i class="fa fa-list-alt"></i></a>
    </div>
</div>
<hr>
{!! Form::open(['route' => 'role_user.store']) !!}

@include('Admin.Role_users.fragment.form')

{!! Form::close() !!}

@endsection

