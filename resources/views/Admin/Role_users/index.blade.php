@extends('layouts.app3')
@section('content')

<strong>LISTADO DE ROLES ASIGNADOS A USUARIOS.</strong>
<hr>

<div class="row">
    <div class="col-sm-3">
        <strong>Crear un asignacion de rol</strong>
        <a class="btn btn-xs btn-block btn-success" href="{{ route('role_user.create')}}" title="Agregar permiso">
            <i class="fa fa-plus-square"></i>
        </a>
    </div>
    <div class="col-sm-3">
        <strong>Generar pdf</strong>
        <a href="{{url('/roles_userspdf')}}" target="_blank" class="btn btn-danger btn-block btn-xs" title="Generar pdf de permisos"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
    </div>
    <div class="col-sm-6">
        @include('Admin.Role_users.fragment.aside')
    </div>
</div>

<div class="col-sm-12 table-responsive-sm">

    <table class="table table-hover" id="table_role_user_id">
        <thead>
            <tr>
                <th>Nombre del usuario</th>
                <th>Nombre del rol</th>
                <th class="text-center">Ver</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Eliminar</th>

            </tr>
        </thead>
        <tbody>
            @foreach($role_users1 as $role_user)
            <tr>
                <td>{{ $role_user->name_user }}</th>
                <td>{{ $role_user->name}}</th>

                <td align="center">
                    <a href="{{ route('role_user.show', $role_user->role_user_id)}}" class="btn btn-secundary  btn-xs" title="Ver asigancion de rol a un usuario"><i class="fa fa-eye"></i></a>
                </td>
                <td align="center">
                    <a href="{{ route('role_user.edit', $role_user->role_user_id)}}" class="btn btn btn-primary  btn-xs" title="Editar una asigancion de rol a un usuario"><i class="fa fa-edit"></i></a>
                </td>
                <td align="center">
                    <form action="{{ route('role_user.destroy', $role_user->role_user_id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn btn-danger  btn-xs" title="Eliminar asigancion de rol a un usuario"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>


@endsection

