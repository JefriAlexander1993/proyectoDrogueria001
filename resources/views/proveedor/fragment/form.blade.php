
<!-- nit -->
<div class="form-group">
{!! Form:: label('nit')!!}
{!!Form::number('nit',null,['class'=>'form-control'])!!}
</div>

<!-- se unieron nombre y precio de compra-->
<div class="row">
<div class="col-sm-8">
<!--Nombre -->
<div class="form-group">
{!! Form:: label('nombreProveedor','Nombre del proveedor')!!}
{!!Form::text('nombreProveedor',null,['class'=>'form-control'])!!}
</div>
</div>
<div class="col-sm-4">
<!--Precio de compra -->
<div class="form-group">
{!! Form:: label('nombreRepresentante','Nombre de representante')!!}
{!!Form::text('nombreRepresentante',null,['class'=>'form-control'])!!}
</div>
</div>
</div>
<!--                          row 2                                             -->
<div class="row">
<div class="col-sm-4">
<!--Cantidad -->
<div class="form-group">
{!!Form:: label('direccion','Dirección')!!}
{!!Form::text('direccion',null,['class'=>'form-control'])!!}
</div>
</div>

<div class="col-sm-4">
<!-- iva -->
<div class="form-group">
{!! Form:: label('telefono','Teléfono')!!}
{!!Form::text('telefono',null,['class'=>'form-control'])!!}
</div>
</div>
<div class="col-sm-4">
<!--Precio de venta -->
<div class="form-group">
{!! Form:: label('email','Email')!!}
{!!Form::text('email',null,['class'=>'form-control'])!!}
</div>
</div>
</div>


<div class="row">
<div class="col-sm-12" >
<!-- Fecha vencimiento -->
<div class="form-group">
{!! Form:: label('observacion','Observación')!!}
{!!Form::textarea('observacion', null,['class'=>'form-control'])!!}
</div>
</div>


<div class="form-group text-center">
{!!Form::button('<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}

</div>