@extends('layouts.app3')
@section('content')
{!!Form::model($compra,['route'=>['compra.update', $compra->id], 'method'=>'PUT']) !!}
<!--Se le pasa, la variable del metodo-->
{{csrf_field()}}
@include('compra.fragment.formEdit')
<!--Incluyo el formulario-->
{!!Form::close()!!}
@endsection
