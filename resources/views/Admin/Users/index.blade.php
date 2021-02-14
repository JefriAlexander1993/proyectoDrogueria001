@extends('layouts.app3')

@section('content')
<strong>LISTADO DE USUARIOS.</strong>
<hr>
        <div class="row">
            <div class="col-sm-3">
                <strong>Agregar usuario:</strong>
                <a class="btn btn-xs btn-block btn-success" href="{{ route('user.create')}}" title="Agregar usuario">
                    <i class="fa fa-plus-square"></i>
                </a>
			</div>
			<div class="col-sm-3">
                <strong>Generar pdf:</strong>
                <a href="{{url('/userspdf')}}" target="_blank" class="btn btn-danger btn-block btn-xs" title="Generar pdf de ventas"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>

            </div>
            <div class="col-sm-6">
                @include('Admin.Users.fragment.aside')
            </div>
        </div>

        <div class="col-sm-12 table-responsive-sm">
            <table class="table table-hover" id="tableUsuario_id">
                <thead>
                    <tr>
                        <th class="text-center">
                            Id
                        </th>
                        <th class="text-center">
                            Nombre
                        </th>
                        <th class="text-center">
                            Email
                        </th>
                        <th class="text-center">
                            Fecha de creación
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
                @foreach($users as $user)
                <tbody>
                    <tr>
                        <td class="text-center">
                            {{ $user->id }}
                        </td>
                        <td class="text-center">
                            {{ $user->name_user }}
                        </td>
                        <td class="text-center">
                            {{ $user->email }}
                        </td>
                        <td class="text-center">
                            {{ $user->created_at}}
                        </td>
                        <td align="center">
                            <a class="btn btn-light btn-xs " href="{{ route('user.show', $user->id)}}" title="Ver Usuario">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                        <td align="center">
                            <a class="btn btn-primary btn-xs" href="{{ route('user.edit', $user->id) }}">
                                <i aria-hidden="true" class="fa fa-pencil-square-o " title="Editar usuario"></i>
                            </a>
                        </td>
                        <td align="center">
                            <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                <input name="_method" type="hidden" value="DELETE">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <button class="btn btn-danger btn-xs" title="Eliminar usuario" type="submit">
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

