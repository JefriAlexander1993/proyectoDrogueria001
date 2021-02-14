@extends('layouts.app3')

@section('content')
<div class="card  col-sm-12">
    <div class="titulo-contenido "><strong>EDITAR PERMISO.</strong></div>
    <div class="card-body t">

        <strong>Acción:</strong>
        <a href="{{route('permission.index')}}" class="btn btn-xs btn-default "><i class="fa fa-list-alt"></i></a>
        <hr>
        {!! Form::model($permission, ['route' => ['permission.update', $permission->id], 'method' => 'PUT']) !!}

        @include('Admin.Permissions.fragment.form')

        {!! Form::close() !!}


    </div>
</div>
@endsection
