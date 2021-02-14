@extends('layouts.app3')
@section('content')
{!!Form::model($credito,['route'=>['credito.update', $credito->id], 'method'=>'PUT']) !!}
<!--Se le pasa, la variable del metodo-->
@include('credito.fragment.formEdit')
<!--Incluyo el formulario-->
{!!Form::close()!!}
@endsection
