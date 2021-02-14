@extends('layouts.app3')

@section('content')
<div class="row">
    <div class="col-sm-10">
        <strong>EDITAR ROL.</strong>
    </div>
    <div class="col-sm-2"><strong>Ir a listado de roles:</strong>
        <a href="{{route('role.index')}}" class="btn btn-xs btn-block btn-warning">
            <i class="fa fa-list-alt" aria-hidden="true"></i>
        </a>
    </div>
</div>
<hr>
{!! Form::model($role, ['route' => ['role.update', $role->id], 'method' => 'PUT']) !!}

@include('Admin.Roles.fragment.form')

{!! Form::close() !!}

@endsection

