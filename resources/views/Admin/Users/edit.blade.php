@extends('layouts.app3')

@section('content')
<div class="row">
    <div class="col-sm-10">
        <strong>EDITAR USUARIO.</strong></div>
    <div class="col-sm-2">
        <strong>Ir a listado de usuario:</strong>
        <a href="{{route('user.index')}}" class="btn btn-xs btn-block btn-warning "><i class="fa fa-list-alt" aria-hidden="true"></i></a>
    </div>
</div>

<hr>
{!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PUT']) !!}

@include('Admin.Users.fragment.form')

{!! Form::close() !!}
@endsection

