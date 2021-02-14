@extends('layouts.app3')

@section('content')
<strong>LISTADO DE PERMISOS.</strong>
<hr>
<div class="row">
    <div class="col-sm-3">
        <strong>Crear un permiso</strong>
        <a class="btn btn-xs btn-block btn-success" href="{{ route('permission.create')}}" title="Agregar permiso">
            <i class="fa fa-plus-square"></i>
        </a>
    </div>
    <div class="col-sm-3">
        <strong>Generar pdf</strong>
        <a href="{{url('/permissionspdf')}}" target="_blank" class="btn btn-danger btn-block btn-xs" title="Generar pdf de permisos"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
    </div>
    <div class="col-sm-6">
        @include('Admin.Permissions.fragment.aside')
    </div>
</div>

<div class="col-md-12 table-responsive">
    <table class="table" style="width:100%" id="table_permissions_id">
        <thead>
            <tr>
                <th class="text-center">
                    Nombre
                </th>
                <th class="text-center">
                    Nombre a mostrar
                </th>
                <th class="text-center">
                    Descripción
                </th>
                <th class="text-center">
                    Ver
                </th>
                <th class="text-center">
                    Editar
                </th>
                <th class="text-center">
                    Eliminar
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
            <tr>
                <td align="center">
                    {{ $permission->namep }}
                </td>
                <td align="center">
                    {{ $permission->display_name }}
                </td>
                <td align="center">
                    {{ $permission->description}}
                </td>
                <td align="center">
                    <a class="btn btn-secundary btn-xs" href="{{ route('permission.show', $permission->id)}}" title="Ver permiso">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
                <td align="center">
                    <a class="btn btn btn-primary btn-xs" href="{{ route('permission.edit', $permission->id)}}" title="Editar permiso">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
                <td align="center">
                    <form action="{{ route('permission.destroy', $permission->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn btn-danger btn-xs" title="Eliminar permiso">
                            <i aria-hidden="true" class="fa fa-trash-o">
                            </i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection


