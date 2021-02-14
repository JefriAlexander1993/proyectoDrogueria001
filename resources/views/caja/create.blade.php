@extends('layouts.app3')
@section('content')
<div class="col-sm-12">
    @include('caja.fragment.error')
</div>
{!!Form::open(['route'=>'caja.store'])!!}
@include('caja.fragment.form')
{!!Form::close()!!}
@endsection
