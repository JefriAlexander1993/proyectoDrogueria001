@extends('layouts.apphome')
@section('content')

 <div class="panel1 panel-primary">
      <div class="panel-heading"><strong>Información del perfil.</strong>&nbsp;&nbsp;&nbsp;
      	

</div>
<div class="panel-body">
<div class="col-md-12">
<p><strong>Nombre:&nbsp;</strong>{{$perfil->name}}</p> 
<p><strong>Correo Electronico:&nbsp;</strong>{{$perfil->email}}</p>

</div>
</div>
</div>

@endsection