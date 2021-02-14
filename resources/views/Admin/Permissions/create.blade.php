@extends('layouts.app3')
@section('content')
<div class="row">
    <div class="col-sm-10">
        <strong>CREAR PERMISO.</strong>
    </div>
    <div class="col-sm-2"><strong>Listado de permisos:</strong>
        <a href="{{route('permission.index')}}" class="btn btn-xs btn-block btn-warning ">
            <i class="fa fa-list-alt" aria-hidden="true"></i>
        </a>
    </div>
</div>
<hr>

{!! Form::open(['route' => 'permission.store']) !!}

@include('Admin.Permissions.fragment.form')

{!! Form::close() !!}

@endsection


