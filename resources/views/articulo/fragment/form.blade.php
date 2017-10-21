
<?php 
 use Illuminate\Support\Facades\DB;
 
?>
<div class="row">
<div class="col-sm-5">
<div class="form-group row has-success">
{!! Form::label('codigo','Ingrese el codigo.')!!}
{!!Form::number('codigo',null,['class'=>'form-control' , 'placeholder'=>'Ej: 12345657'])!!}
</div>
</div>
<div class="col-sm-2">
<div class="form-group row has-success">
{!! Form::label('descripcion','Descripcion.')!!}
{!!Form::text('descripcion',null,['class'=>'form-control', 'placeholder'=>'Ej: Acetaminofen'])!!}
</div>
</div>
<div class="col-sm-5">
<div class="form-group row has-success">
{!! Form::label('marca','Marca del articulo.')!!}
{!!Form::text('marca',null,['class'=>'form-control', 'placeholder'=>'Ej: La Santè'])!!}
</div>
</div>
</div>

<div class="row">
<div class="col-sm-4">
<div class="form-group row has-success">
{!!Form::label('rubro','Rubro.')!!}
{!!Form::text('rubro', null,['class'=>'form-control', 'placeholder'=>'Ej: Farmacia'])!!}
</div>
</div>

<div class="col-sm-4">
<div class="form-group row has-success">
{!!Form::label('precioVenta','Precio unitario de venta.')!!}
{!!Form::number('precioVenta',null,['class'=>'form-control','placeholder'=>'Ej: 10000'])!!}
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
{!!Form::label('stock','Stock.')!!}
{!!Form::number('stock',null,['class'=>'form-control','placeholder'=>'Ej: 20 '])!!}
</div>
</div>

</div> 

<br>
<br>
<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}
</div> 
