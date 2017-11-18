@extends('layouts.apphome')
@section('content')
 
 <div class="panel1 panel-primary">
      <div class="panel-heading"><strong>Información del perfil.</strong>&nbsp;&nbsp;&nbsp;
      	<td align="center"><a href="{{route('perfil.edit', $perfil->id )}}"   id="passwordPerfil"  class="btn btn-sm btn-default">
        <i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
      </td>

</div>
<div class="panel-body">
<div class="col-md-12"></div>
<p><strong>Nombre:&nbsp;</strong>{{$perfil->name}}</p> 
<p><strong>Correo Electronico:&nbsp;</strong>{{$perfil->email}}</p>
<p><strong>Pais:&nbsp;</strong>{{$perfil->pais}}</p> 
<p><strong>Ciudad:&nbsp;</strong>{{$perfil->ciudad}}</p> 
<p><strong>Fecha de Nacmimiento:&nbsp;</strong>{{$perfil->fechaNacimiento}}</p> 
<p><strong>Estudios:&nbsp;</strong>{{$perfil->estudios}}</p> 


<p><strong>Informacion Personal:&nbsp;</strong>{{$perfil->informacionPersonal}}</p> 


</div>
</div>
	
</div>


@endsection