<!-- Fecha -->
<div class="row">
<div class="col-sm-6">
<div class="form-group">
{!!Form::label('nombreUsuario','Nombre del usuario de la caja')!!}
{!!Form::text('nombreUsuario', null,['class'=>'form-control'])!!}
</div>
</div>
<div class="col-sm-6">
<!--Nombre -->
<div class="form-group">
{!! Form:: label('valorInicial','Valor inicial')!!}
<input type="number"  class="form-control" step="any" name="valorInicial" />
<!-- {!!Form::number('valorInicial',null,['class'=>'form-control'])!!} --> 
</div>
</div>
</div>
<!-- se unieron nombre y precio de compra-->

<div class="col-sm-6">
<!--Precio de compra -->
<div class="form-group">
{!! Form:: label('valorFinal','Valor final')!!}
{!!Form::number('valorFinal',null,['class'=>'form-control'])!!}
</div>
</div>
<div class="row">
<div class="col-sm-6">
<!--Cantidad -->
<div class="form-group">
{!!Form:: label('ganancia','Ganancia')!!}
{!!Form::number('ganancia',null,['class'=>'form-control'])!!}
</div>
</div>

</div>
<!--                          row 2                                             -->

<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}

</div>
