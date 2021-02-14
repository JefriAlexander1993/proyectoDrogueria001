@extends('layouts.app3')
@section('content')
<div class="row">
	<div class="col-sm-9"><strong>CREAR ASIGNACION DE PERMISOS A ROLES.</strong></div>
	<div class="col-sm-3">
		<strong>Ir a listado de permisos asignados:</strong>
		<a href="{{route('permission_role.index')}}" class="btn btn-xs btn-block btn-warning "><i class="fa fa-list-alt" aria-hidden="true"></i></a>
	</div>
</div>

{!! Form::open(['route' => 'permission_role.store']) !!}

@include('Admin.Permission_roles.fragment.form')

{!! Form::close() !!}


@endsection

