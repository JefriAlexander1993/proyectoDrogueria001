@extends('layouts.app3')
@section('content')



<div class="col-md-12">

    <!-- Profile Image -->
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
          <img class="profile-user-img img-fluid img-circle"  src="{{asset('assets/img/logo.png')}}"  alt="User profile picture">
        </div>
        <a href="{{route('perfil.edit',$perfil->id)}}" class="btn  btn-primary btn-sm" title="Editar perfil"><i class="fa fa-edit" aria-hidden="true"></i></a>
     
        <h3 class="profile-username text-center">{{$perfil->name_user}}</h3>

        <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>Email</b> <a class="float-right">{{$perfil->email}}</a>
          </li>
          {{-- <li class="list-group-item">
            <b>Following</b> <a class="float-right">543</a>
          </li>
          <li class="list-group-item">
            <b>Friends</b> <a class="float-right">13,287</a>
          </li> --}}
        </ul>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    
    <!-- /.card -->
  </div>
@endsection

