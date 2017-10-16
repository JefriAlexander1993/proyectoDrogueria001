
<!-- Fecha -->
<div class="form-group">
{!! Form:: label('fechaLlegada','Fecha de compra')!!}
{!!Form::date('fechaLlegada', null,['class'=>'form-control'])!!}
</div>

<!-- se unieron nombre y precio de compra-->
<div class="row">
<div class="col-sm-8">
<!--Nombre -->
<div class="form-group">
{!! Form:: label('nombre','Nombre del producto')!!}
{!!Form::text('nombre',null,['class'=>'form-control'])!!}
</div>
</div>
<div class="col-sm-4">
<!--Precio de compra -->
<div class="form-group">
{!! Form:: label('precioCompra','Precio de compra')!!}
{!!Form::number('precioCompra',null,['class'=>'form-control'])!!}
</div>
</div>
</div>
<!--                          row 2                                             -->
<div class="row">
<div class="col-sm-4">
<!--Cantidad -->
<div class="form-group">
{!!Form:: label('cantidad','Cantidad')!!}
{!!Form::number('cantidad',null,['class'=>'form-control'])!!}
</div>
</div>
<div class="col-sm-4">
<!-- iva -->
<div class="form-group">
{!! Form:: label('iva','Iva (%)')!!}
{!!Form::number('iva',null,['class'=>'form-control'])!!}
</div>
</div>
<div class="col-sm-4">
<!--Precio de venta -->
<div class="form-group">
{!! Form:: label('precioVenta','Precio de venta.')!!}
{!!Form::number('precioVenta',null,['class'=>'form-control'])!!}
</div>
</div>
</div>


<div class="row">
<div class="col-sm-5">
<!-- Fecha vencimiento -->
<div class="form-group">
{!! Form:: label('fechaVencimiento','Fecha de vencimiento')!!}
{!!Form::date('fechaVencimiento', null,['class'=>'form-control'])!!}
</div>
</div>

<div class="col-sm-4">
<!-- Nombre de proveedor-->
<div class="form-group">
{!! Form:: label('nombreProveedor','Nombre de proveedor')!!}
{!!Form::text('nombreProveedor', null,['class'=>'form-control'])!!}
</div>
</div>

<div class="col-sm-3">
<!-- Stock -->
<div class="form-group">
{!! Form::label('stock','Cantidad minima.')!!}
{!!Form::number('stock',null,['class'=>'form-control'])!!}
  
</div>
</div>
</div>

<div class="form-group text-center">
{!!Form::button('<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}

</div>