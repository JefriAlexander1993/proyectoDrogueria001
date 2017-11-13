@extends('layouts.apphome')
@section('content')

<div class="col-sm-12">
  
<a href="{{route('perfil.create')}}" class="btn btn-success"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
@role('admin')
<a href="{{url('/perfilpdf')}}" class="btn btn btn-secondary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
@endrole
</div>

<div class="row">
<div class="col-sm-7" style="text-align:center"><h2><strong>LISTADO DE PERFILES.</strong></h2>
</div>
<div class="col-sm-4">
@include('perfil.fragment.aside') 
</div>
</div> 

<div class="col-md-12 table-responsive" style="text-align:center" >

<table class="table table-hover">
    <thead>
        <tr>
        <th class="text-center">Nombre</th>
        <th class="text-center">Email</th>
        
        <th class="text-center" colspan="3" >Acción</th>    
        </tr>
        </thead>
    <tbody>
        @foreach ($perfil as $perfil1)
       <tr>
       <td align="center">{{$perfil1->name}}</td>
       <td align="center">{{$perfil1->email}}</td>
       
      
       <td align="center"><a href="{{route('perfil.edit', $perfil1->id)}}" class="btn btn-sm btn-default">
        <i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
      </td>
       <td align="center"><a href="{{route('perfil.show', $perfil1->id)}}" class="btn btn-sm btn-primary">
        <i class="fa fa-eye" aria-hidden="true"></i></a>
      </td>
       
       <input type="hidden" name="_method" value="DELETE">  
       <button class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
       
       
       </tr>
       @endforeach
        </tbody>
</table>


<div class="col-md-11" align="center" >

<?php 
echo phpversion('tidy');
?>
</div>
</div>




@endsection