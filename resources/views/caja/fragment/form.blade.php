<div class="row">
<div class="col-sm-6">
<div class="form-group">
{!!Form::label('nombreusuario','Nombre del usuario de la caja')!!}
{!!Form::text('nombreusuario',$name,['class'=>'form-control'])!!} 
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
{!! Form:: label('valorinicial','Valor inicial')!!}
{!!Form::number('valorinicial',null,['class'=>'form-control' , 'placeholder'=>'100000', 'id'=>'valorinicial','min'=>'1','onkeypress'=>'return soloNumeros(event)'])!!} 
</div>
</div>
</div>

<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-primary btn-lg btn-block'))!!}
</div>
