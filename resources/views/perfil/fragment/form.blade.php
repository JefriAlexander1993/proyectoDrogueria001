<div class="row">
<div class="col-sm-2">
<div class="form-group row has-success">
{!! Form::label('nombre','Nombre(*).')!!}
{!!Form::number('nombre',null,['class'=>'form-control','title'=>'Nombre.','id'=>'nombre','required'=>'required'])!!}
</div>
</div>
<div class="col-sm-3">
<div class="form-group row has-success">
{!! Form::label('email','Correo Electronico(*).')!!}
{!!Form::number('email',null,['class'=>'form-control','title'=>'CorreoElectronico.','id'=>'email','required'=>'required'])!!}
</div>
</div>
<div class="col-sm-2">
<div class="form-group row has-success">
{!! Form::password('contraseña','Contraseña(*).')!!}
{!!Form::number('contraseña',null,['class'=>'form-control','title'=>'Contraseña.','id'=>'contraseña','required'=>'required'])!!}
</div>
</div>


<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-primary btn-lg btn-block'))!!}
</div> 
