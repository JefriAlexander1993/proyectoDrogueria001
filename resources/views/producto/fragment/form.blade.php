
<?php 
 use Illuminate\Support\Facades\DB;
 

?>
<div class="row">
<div class="col-sm-5">
<div class="form-group">
{!! Form::label('codigo','Ingrese el codigo.')!!}
{!!Form::number('codigo',null,['class'=>'form-control'])!!}
</div>
</div>
<div class="col-sm-2">
<div class="form-group">
{!! Form::label('fechaLlegada','Fecha de compra.')!!}
{!!Form::date('fechaLlegada',\Carbon\Carbon::now(),['class'=>'form-control'], array('disabled'))!!}
</div>
</div>
<div class="col-sm-5">
<div class="form-group">
{!! Form::label('nombre','Nombre del producto.')!!}
{!!Form::text('nombre',null,['class'=>'form-control'])!!}
</div>
</div>
</div>

<div class="row">
<div class="col-sm-4">
<div class="form-group">
{!!Form::label('rubio','Rubio.')!!}
{!!Form::text('rubio', null,['class'=>'form-control'])!!}
</div>
</div>
<div class="col-sm-4">
<div class="form-group">
{!!Form::label('nombreProveedor','Nombre de proveedor.')!!}
<?php $producto = DB::table('productos')->pluck('nombreProveedor');
 echo Form::select('nombreProveedore', $producto, null,['class'=>'form-control', 'type'=>'text' ,'placeholde'=>'Proveedores']);
?> 
 <!-- {!!Form::text('nombreProveedor', null,['class'=>'form-control', 'placeholder'=>'Proveedores'])!!}  -->

</div>
</div>
<div class="col-sm-4">
<div class="form-group">
{!!Form::label('precioUnitario','Precio  unitario.')!!}
{!!Form::number('precioUnitario',null,['class'=>'form-control'])!!}
</div>
</div>
</div>
                                                        
<div class="row">
<div class="col-sm-2">
<div class="form-group">
{!!Form::label('cantidad','Cantidad.')!!}
{!!Form::number('cantidad',null,['class'=>'form-control'])!!}
</div> 
</div> 

<div class="col-sm-2">
<div class="form-group">
{!!Form::label('totalCompra','Total de la compra.')!!}
{!!Form::number('totalCompra',null,['class'=>'form-control'])!!}
</div>
</div>
<div class="col-sm-2">
<div class="form-group">
{!!Form::label('fechaVencimiento','Fecha de vencimiento')!!}
{!!Form::date('fechaVencimiento', null,['class'=>'form-control'])!!}
</div>
</div>

<div class="col-sm-2">
<div class="form-group">
{!! Form::label('iva','Iva (%).')!!}
{!!Form::number('iva',null,['class'=>'form-control'])!!}
</div> 
</div> 
<div class="col-sm-2">
<div class="form-group">
{!! Form::label('precioVenta','Precio de venta.')!!}
{!!Form::number('precioVenta',null,['class'=>'form-control'])!!}
</div> 
</div> 
<div class="col-sm-2">
<div class="form-group">
{!! Form::label('stock','Cantidad minima.')!!}
{!!Form::number('stock',null,['class'=>'form-control'])!!}
</div> 
</div> 
</div> 

<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}

</div> 

