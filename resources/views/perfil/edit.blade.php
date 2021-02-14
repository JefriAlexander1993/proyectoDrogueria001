@extends('layouts.app3')
@section('content')
{!!Form::model($perfil,['route'=>['perfil.update', $perfil->id], 'method'=>'PUT']) !!}
<!--Se le pasa, la variable del metodo-->
@include('perfil.fragment.form')
<!--Incluyo el formulario-->
{!!Form::close()!!}
@endsection

