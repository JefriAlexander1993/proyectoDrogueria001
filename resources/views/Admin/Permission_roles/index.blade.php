@extends('layouts.app3')

@section('content')

<strong>LISTADO DE PERMISOS ASIGNADOS A ROLES.</strong>
<hr>

<div class="row">
    <div class="col-sm-3">
        <strong>Crear una asignación de permiso.</strong>
        <a class="btn btn-xs btn-block btn-success " href="{{ route('permission_role.create')}}" title="Agregar producto">
            <i class="fa fa-plus-square"></i>
        </a>
    </div>
    <div class="col-sm-3">
        <strong>Generar pdf.</strong>
        <a href="{{url('/asignacionpermisospdf')}}" target="_blank" class="btn btn-danger btn-block btn-xs" title="Generar pdf de ventas"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>

        </a>
    </div>

    <div class="col-sm-6">
        @include('Admin.Permission_roles.fragment.aside')
    </div>
</div>
<div class="col-sm-12 table-responsive">
    <table class="table table-bordered" style="width:100%"  id="permission_roles_id">
        <thead>
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">Nombre del permiso</th>
                <th class="text-center">Nombre del rol</th>
                <th class="text-center">Ver</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Eliminar</th>

            </tr>
        </thead>
        <tbody>
            @foreach($permission_roles as $permission_role)
            <tr>
                <td class="text-center">{{ $permission_role->id }}</td>
                <td class="text-center">{{ $permission_role->namep }}</td>
                <td class="text-center">{{ $permission_role->name }}</td>

                <td align="center">
                    <a href="{{ route('permission_role.show', $permission_role->id)}}" class="btn btn-secundary btn-xs" title="Ver permiso asignado a rol"><i class="fa fa-eye"></i></a>
                </td>
                <td align="center">
                    <a href="{{ route('permission_role.edit', $permission_role->id)}}" class="btn btn btn-primary  btn-xs" title="Editar permiso asignado rol"><i class="fa fa-edit"></i></a>
                </td>
                <td align="center">
                    <form action="{{ route('permission_role.destroy', $permission_role->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn btn-danger  btn-xs" title="Eliminar permiso  asignado a rol"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

