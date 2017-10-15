
<!-- Fecha -->
<div class="form-group">
{!! Form:: label('Nombre del usuario de la caja')!!}
{!!Form::text('nombreUsuario', null,['class'=>'form-control'])!!}
</div>

<!-- se unieron nombre y precio de compra-->
<div class="row">
<div class="col-sm-8">
<!--Nombre -->
<div class="form-group">
{!! Form:: label('valorInicial','Valor inicial')!!}
{!!Form::number('valorInicial',null,['class'=>'form-control'])!!}
</div>
</div>
<div class="col-sm-4">
<!--Precio de compra -->
<div class="form-group">
{!! Form:: label('valorFinal','Valor final')!!}
{!!Form::number('valorFinal',null,['class'=>'form-control'])!!}
</div>
</div>
</div>
<!--                          row 2                                             -->
<div class="row">
<div class="col-sm-4">
<!--Cantidad -->
<div class="form-group">
{!!Form:: label('ganancia','Ganancia')!!}
{!!Form::number('ganancia',null,['class'=>'form-control'])!!}
</div>
</div>

<div class="form-group text-center">
{!!Form::button('<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}

</div>