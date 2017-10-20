
<!-- nit -->
<div class="form-group">
{!! Form:: label('nit')!!}
{!!Form::number('nit',null,['class'=>'form-control','placeholder' => 'Ej: 12324242'])!!}
</div>

<!-- se unieron nombre y precio de compra-->
<div class="row">
<div class="col-sm-8">
<!--Nombre -->
<div class="form-group">
{!! Form:: label('nombreProveedor','Nombre del proveedor')!!}
{!!Form::text('nombreProveedor',null,['class'=>'form-control', 'placeholder' => 'Ej: Tecnoquimica'])!!}
</div>
</div>
<div class="col-sm-4">
<!--Precio de compra -->
<div class="form-group">
{!! Form:: label('nombreRepresentante','Nombre de representante')!!}
{!!Form::text('nombreRepresentante',null,['class'=>'form-control','placeholder' => 'Ej: Fredy Alan Mora Chavéz'])!!}
</div>
</div>
</div>
<!--                          row 2                                             -->
<div class="row">
<div class="col-sm-4">
<!--Cantidad -->
<div class="form-group">
{!!Form:: label('direccion','Dirección')!!}
{!!Form::text('direccion',null,['class'=>'form-control', 'placeholder' => 'Ej: Calle 5 13-18'])!!}
</div>
</div>

<div class="col-sm-4">
<!-- iva -->
<div class="form-group">
{!! Form:: label('telefono','Teléfono')!!}
{!!Form::text('telefono',null,['class'=>'form-control','placeholder' => 'Ej: 3245341234'])!!}
</div>
</div>
<div class="col-sm-4">
<!--Precio de venta -->
<div class="form-group">
{!! Form:: label('email','Email')!!}
{!!Form::text('email',null,['class'=>'form-control','placeholder' => 'Eje: alan@gmail.com' ])!!}
</div>
</div>
</div>


<div class="row">
<div class="col-sm-12" >
<!-- Fecha vencimiento -->
<div class="form-group">
{!! Form:: label('observacion','Observación')!!}
{!!Form::textarea('observacion', null,['class'=>'form-control', 'placeholder' => 'Ej: El representante solo pasa los sabados a las 4pm.'])!!}
</div>
</div>


<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}

</div>