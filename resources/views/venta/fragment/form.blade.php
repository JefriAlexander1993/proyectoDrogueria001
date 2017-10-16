
<!-- nit -->
<div class="form-group">
{!! Form:: label('fechaVetan')!!}
{!!Form::date('fechaVenta',null,['class'=>'form-control'])!!}
</div>
<!-- se unieron nombre y precio de compra-->
<div class="row">
<div class="col-sm-8">
<!--Nombre -->
<div class="form-group">
{!! Form:: label('usuario','Nombre del proveedor')!!}
{!!Form::text('usuario',null,['class'=>'form-control'])!!}
</div>
</div>
<div class="col-sm-4">
<!--Precio de compra -->
<div class="form-group">
{!! Form:: label('nombreProducto','Nombre de representante')!!}
{!!Form::text('nombreProducto',null,['class'=>'form-control'])!!}
</div>
</div>
</div>
<!--                          row 2                                             -->
<div class="row">
<div class="col-sm-4">
<!--Cantidad -->
<div class="form-group">
{!!Form:: label('cantidad','Dirección')!!}
{!!Form::number('cantidad',null,['class'=>'form-control'])!!}
</div>
</div>


<div class="col-sm-4">
<!-- iva -->
<div class="form-group">
{!! Form:: label('precioUnitario','Teléfono')!!}
{!!Form::number('precioUnitario',null,['class'=>'form-control'])!!}
</div>
</div>
<div class="col-sm-4">
<!--Precio de venta -->
<div class="form-group">
{!! Form:: label('iva','Email')!!}
{!!Form::number('iva',null,['class'=>'form-control'])!!}
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12" >
<!-- Fecha vencimiento -->
<div class="form-group">
{!! Form:: label('precioTotal','Observación')!!}
{!!Form::number('precioTotal', null,['class'=>'form-control'])!!}
</div>
</div>

<div class="form-group text-center">
{!!Form::button('<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}

</div>