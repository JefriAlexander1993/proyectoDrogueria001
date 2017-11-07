<div class="row">
<div class="col-sm-2">
<div class="form-group row has-success">
{!! Form::label('nuip','Numero de cedula.')!!}
{!!Form::number('nuip',null,['class'=>'form-control','min'=>'11','placeholder'=>'Ej: 66.345.234','id'=>'nuip','required'=>'required'])!!}
</div>
</div>
<div class="col-sm-3">
<div class="form-group row has-success">
{!! Form::label('nombre','Nombre del usuario.')!!}
{!!Form::text('nombre',null,['class'=>'form-control','onblur'=>'limpia()','title'=>'Solo se permite numeros','onkeypress'=>'return soloLetra(event)','placeholder'=>'Ej: Juan Perez','id'=>'nombreCliente','required'=>'required' ])!!}
</div>
</div>
<div class="col-sm-2">
<div class="form-group row has-success">
{!! Form::label('telefono','Telefono.')!!}
{!!Form::text('telefono',null,['class'=>'form-control','onkeypress'=>'return valida(event)','placeholder'=>'Ej: 3207697523','id'=>'telefonoCliente','required'=>'required'])!!}
</div>
</div>
<div class="col-sm-2">
<div class="form-group row has-success">
{!! Form::label('direccion','Direccion.')!!}
{!!Form::text('direccion',null,['class'=>'form-control', 'placeholder'=>'Ej: Cra 10a #24-22', 'id'=>'direccion'])!!}
</div>
</div>
<div class="col-sm-3">
<div class="form-group row has-success">
{!!Form::label('correoelectronico','Correo Electronico.')!!}
{!!Form::text('correoelectronico', null,['class'=>'form-control', 'placeholder'=>'Ej: ejemplo@correo.com','id'=>'emailCliente'])!!}
</div>
</div>
</div>
                                                        
<div class="row">
<div class="col-sm-12">
<div class="form-group row has-success">
{!!Form::label('observacion','Observacion.')!!}
{!!Form::textarea('observacion',null,['class'=>'form-control','placeholder'=>'Ej: Llamar al cliente cada 5 de mes.', 'id'=>'obCliente'])!!}
</div> 
</div> 
</div> 

<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-primary btn-lg btn-block'))!!}
</div> 
<script>

</script>