
<?php 
 use Illuminate\Support\Facades\DB;
 
?>
<<<<<<< HEAD


<div class="col-sm-12">
<div class="form-group row has-success">
{!! Form::label('codigo_id','Codigo.')!!}
{!!Form::number('codigo_id',null,['class'=>'form-control' , 'placeholder'=>'Ej: 23232'])!!}
</div>
</div>
<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-primary btn-lg btn-block'))!!}
=======
<div class="row">
<div class="col-sm-5">
<div class="form-group row has-success">
{!! Form::label('codigo','Ingrese el codigo.')!!}
{!!Form::number('codigo',null,['class'=>'form-control' , 'placeholder'=>'Ej: 12345657'])!!}
</div>
</div>
<div class="col-sm-2">
<div class="form-group row has-success">
{!! Form::label('fechaLlegada','Fecha de compra.')!!}
{!!Form::date('fechaLlegada',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'Ej: 20/10/2017'], array('disabled'))!!}
</div>
</div>
<div class="col-sm-5">
<div class="form-group row has-success">
{!! Form::label('nombre','Nombre del producto.')!!}
{!!Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Ej: Acetaminofen'])!!}
</div>
</div>
</div>

<div class="row">
<div class="col-sm-4">
<div class="form-group row has-success">
{!!Form::label('rubio','Rubio.')!!}
{!!Form::text('rubio', null,['class'=>'form-control', 'placeholder'=>'Ej: Farmacia'])!!}
</div>
</div>
<div class="col-sm-4">
<div class="form-group row has-success">
{!!Form::label('nombreProveedor','Nombre de proveedor.')!!}
<?php $producto = DB::table('productos')->pluck('nombreProveedor');
 echo Form::select('nombreProveedor', $producto, null,['class'=>'form-control', 'type'=>'text' ]);
?> 
 <!-- {!!Form::text('nombreProveedor', null,['class'=>'form-control', 'placeholder'=>'Proveedores'])!!}  -->

</div>
</div>
<div class="col-sm-4">
<div class="form-group row has-success">
{!!Form::label('precioUnitario','Precio  unitario.')!!}
{!!Form::number('precioUnitario',null,['class'=>'form-control','placeholder'=>'Ej: 200', 'step'=>'any'])!!}
</div>
</div>
</div>
                                                        
<div class="row">
<div class="col-sm-2">
<div class="form-group row has-success">
{!!Form::label('cantidad','Cantidad.')!!}
{!!Form::number('cantidad',null,['class'=>'form-control', 'placeholder'=>'Ej: 10'])!!}
</div> 
</div> 

<div class="col-sm-2">
<div class="form-group row has-success">
{!!Form::label('totalCompra','Total de la compra.')!!}
{!!Form::number('totalCompra',null,['class'=>'form-control','placeholder'=>'Ej: 2000 '])!!}
</div>
</div>
<div class="col-sm-2">
<div class="form-group row has-success">
{!!Form::label('fechaVencimiento','Fecha de vencimiento')!!}
{!!Form::date('fechaVencimiento', null,['class'=>'form-control', 'placeholder'=>'20/12/2017'])!!}
</div>
</div>

<div class="col-sm-2">
<div class="form-group row has-success">
{!! Form::label('iva','Iva (%).')!!}
{!!Form::number('iva',null,['class'=>'form-control', 'placeholder'=>'20/12/2017'])!!}
</div> 
</div> 
<div class="col-sm-2">
<div class="form-group row has-success">
{!! Form::label('precioVenta','Precio de venta.')!!}
{!!Form::number('precioVenta',null,['class'=>'form-control' , 'placeholder'=>'400'])!!}
</div> 
</div> 
<div class="col-sm-2">
<div class="form-group row has-success">
{!! Form::label('stock','Cantidad minima.')!!}
{!!Form::number('stock',null,['class'=>'form-control' , 'placeholder'=>'3'])!!}
</div> 
</div> 
</div> 

<br>
<br>
<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}
>>>>>>> f1ed23d7815e804265035c3f93658fe94b9ba3e3
</div> 

