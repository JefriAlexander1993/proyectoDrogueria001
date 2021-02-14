@extends('layouts.app3')

@section('content')
<strong>LISTADO DE ROLES.</strong>
<hr>
        <div class="row">
            <div class="col-sm-3">
                <strong>Crear un rol</strong>
                <a class="btn btn-xs btn-block btn-success " href="{{ route('role.create')}}" title="Agregar producto">
                    <i class="fa fa-plus-square"></i>
                </a>
            </div>
            <div class="col-sm-3">
                <strong>Generar pdf</strong>
                <a href="{{url('/rolespdf')}}" target="_blank" class="btn btn-danger btn-block btn-xs" title="Generar pdf de roles"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>

            </div>
            <div class="col-sm-6">
                @include('Admin.Roles.fragment.aside')
            </div>
        </div>
        <div class="col-sm-12 table-responsive-sm">
            <table class="table table-hover" id="tableRoles_id">
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
                @foreach($roles as $role)
                <tbody>
                    <tr>
                        <td align="center">
                            {{ $role->name }}
                        </td>
                        <td align="center">
                            {{ $role->display_name }}
                        </td>
                        <td align="center">
                            {{ $role->description}}
                        </td>
                        <td align="center">
                            <a class="btn  btn-light btn-xs" href="{{ route('role.show', $role->id)}}" title="Ver rol">
                                <i class="fa fa-eye">
                                </i>
                            </a>
                        </td>
                        <td align="center">
                            <a class="btn btn btn-primary btn-xs" href="{{ route('role.edit', $role->id)}}" title="Editar rol">
                                <i class="fa fa-edit">
                                </i>
                            </a>
                        </td>
                        <td align="center">
                            <form action="{{ route('role.destroy', $role->id) }}" method="POST">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn btn-danger btn-xs " title="Eliminar permiso">
                                    <i aria-hidden="true" class="fa fa-trash-o">
                                    </i>
                                </button>
                            </form>
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

@endsection

