<?php 
 use Illuminate\Support\Facades\DB;
 
?>
<div class="row">
<div class="col-sm-3">
<div class="form-group row has-success">
{!! Form::label('nombre','Ingrese el nombre del usuario.')!!}
{!!Form::text('nombre',null,['class'=>'form-control' , 'placeholder'=>'Ej: Juan Perez'])!!}
</div>
</div>
<div class="col-sm-3">
<div class="form-group row has-success">
{!! Form::label('telefono','Telefono.')!!}
{!!Form::text('telefono',null,['class'=>'form-control', 'placeholder'=>'Ej: 3207697523'])!!}
</div>
</div>
<div class="col-sm-3">
<div class="form-group row has-success">
{!! Form::label('direccion','Direccion.')!!}
{!!Form::text('direccion',null,['class'=>'form-control', 'placeholder'=>'Ej: Cra 10a #24-22'])!!}
</div>
</div>
<div class="col-sm-3">
<div class="form-group row has-success">
{!!Form::label('correoelectronico','Correo Electronico.')!!}
{!!Form::text('correoelectronico', null,['class'=>'form-control', 'placeholder'=>'Ej: ejemplo@correo.com'])!!}
</div>
</div>
</div>
                                                        
<div class="row">
<div class="col-sm-12">
<div class="form-group row has-success">
{!!Form::label('observacion','Observacion.')!!}
{!!Form::textarea('observacion',null,['class'=>'form-control','placeholder'=>'Ej: Llamar al cliente cada 5 de mes.'])!!}
</div> 
</div> 

<br>
<br>
<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-primary btn-lg btn-block'))!!}
</div> 
