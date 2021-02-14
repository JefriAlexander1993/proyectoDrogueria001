
  	
<div class="row">
<div class="col-sm-1"><strong>Ver perfil</strong>
	<a href="{{ route('perfil.show',auth()->user()->id) }}" class="btn btn-xs btn-block btn-warning" title="Ver perfil"><i class="fa fa-list-alt" aria-hidden="true"></i></a> 
</div>
</div>
<hr>			
	<div class="row">
		<div class="col-sm-4">
			<div class="form-group row has-success">
			{!! Form::label('name_user','Nombre(*).')!!}
			{!!Form::text('name_user',null,['class'=>'form-control','Nombre del usuario','title'=>'Nombre.','id'=>'name','required'=>'required'])!!}
			</div>
		</div>	
		<div class="col-sm-4">
			<div class="form-group row has-success">
			{!! Form::label('email','Correo Electronico(*).')!!}
			{!!Form::text('email',null,['class'=>'form-control','title'=>'CorreoElectronico.','id'=>'email','required'=>'required'])!!}
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group row has-success" >
			{!! Form::label('password','Contraseña.')!!}
			{!!Form::password('password',['class'=>'form-control','placeholder'=>'Nueva contraseña','title'=>'Contraseña.','id'=>'password'])!!}
			</div>
		</div>
	</div> 

	<div class="form-group text-center">
	{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-primary btn-lg btn-block'))!!}
	</div> 

