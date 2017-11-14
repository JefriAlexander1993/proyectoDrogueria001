<div class="row">
<div class="col-sm-6">
<div class="form-group row has-success">
{!! Form::label('name','Nombre(*).')!!}
{!!Form::text('name',null,['class'=>'form-control','title'=>'Nombre.','id'=>'name','required'=>'required'])!!}
</div>
</div>
<div class="col-sm-6">
<div class="form-group row has-success">
{!! Form::label('email','Correo Electronico(*).')!!}
{!!Form::text('email',null,['class'=>'form-control','title'=>'CorreoElectronico.','id'=>'email','required'=>'required'])!!}
</div>
</div>
</div>
<div class="row">
<div class="col-sm-2">
<div class="form-group row has-success">
{!! Form::label('pais','Pais.')!!}
{!!Form::text('pais',null,['class'=>'form-control','title'=>'Pais.','id'=>'pais'])!!}
</div>
</div>
<div class="col-sm-2">
<div class="form-group row has-success">
{!! Form::label('ciudad','Ciudad.')!!}
{!!Form::text('ciudad',null,['class'=>'form-control','title'=>'Ciudad.','id'=>'ciudad'])!!}
</div>
</div>
<div class="col-sm-3">
<div class="form-group row has-success">
{!! Form::label('fechaNacimiento','FechaNacimiento.')!!}
{!!Form::date('fechaNacimiento',null,['class'=>'form-control','title'=>'FechaNacimiento.','id'=>'fechaNacimiento'])!!}
</div>
</div>
<div class="col-sm-5">
<div class="form-group row has-success">
{!! Form::label('estudios','Estudios.')!!}
{!!Form::text('estudios',null,['class'=>'form-control','title'=>'Estudios.','id'=>'Estudios'])!!}
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="form-group row has-success" >
{!! Form::label('informacionPersonal','InformacionPersonal.')!!}
{!!Form::textarea('informacionPersonal',null,['class'=>'form-control','title'=>'InformacionPersonal.','id'=>'informacionPersonal'])!!}
</div>
</div>
</div>


<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-primary btn-lg btn-block'))!!}
</div> 
