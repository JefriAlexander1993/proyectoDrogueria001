@extends('layouts.app3')

@section('content')

<div class="card  col-sm-12" style="margin-left:auto;">
    <div class="titulo-contenido "><strong>CREAR USUARIO.</strong></div>
    <div class="card-body t">

        <strong>Acción:</strong>
        <a href="{{route('user.index')}}" class="btn btn-xs btn-default "><i class="fas fa-angle-left"></i></a>

        <hr>
        {!! Form::open(['url' => 'Users/register']) !!}

        @include('Admin.Users.fragment.form')

        {!! Form::close() !!}
    </div>
</div>
</div>

@endsection

