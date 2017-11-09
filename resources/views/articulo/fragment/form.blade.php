
<?php 
 use Illuminate\Support\Facades\DB;
 
?>
<div class="row">
<div class="col-sm-5">
<div class="form-group row has-success">
{!! Form::label('codigo','Ingrese el codigo.')!!}
{!!Form::number('codigo',null,['class'=>'form-control' , 'placeholder'=>'Ej: 12345657' , 'onKeyPress'=>'return soloNumeros(event)','required'=>'required'])!!}
</div>
</div>
<div class="col-sm-2">
<div class="form-group row has-success">
{!! Form::label('fechavencimiento','Fecha de vencimiento.')!!}
{!!Form::date('fechavencimiento',null,['class'=>'form-control', 'placeholder'=>'Ej: 23/10/2017','required'=>'required'])!!}
</div>
</div>
<div class="col-sm-5">
<div class="form-group row has-success">
{!! Form::label('nombre','Nombre.')!!}
{!!Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Ej: Acetaminofen','required'=>'required', 'onkeypress'=>'return soloLetras(event)' ,'onKeyUp'=>'this.value = this.value.toUpperCase()','id'=>'nombreArticulo','title'=>'Ingresa el nombre del articulo'])!!}
</div>
</div>
</div>

<div class="row">
<div class="col-sm-4">
<div class="form-group row has-success">
{!! Form::label('rubro','Rubro.')!!}
{!!Form::text('rubro',null,['class'=>'form-control', 'placeholder'=>'Ej: Farmacia','onkeypress'=>'return soloLetras(event)' ,'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
</div>
</div>
<div class="col-sm-2">
<div class="form-group row has-success">
{!! Form::label('marca','Marca.')!!}
{!!Form::text('marca',null,['class'=>'form-control','required'=>'required','onkeypress'=>'return soloLetras(event)' ])!!}
</div>
</div>
<div class="col-sm-2">
<div class="form-group row has-success">
{!! Form::label('cantidad','Cantidad.')!!}
{!!Form::text('cantidad',null,['class'=>'form-control','required'=>'required','onKeyPress'=>'return soloNumeros(event)' ,'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
</div>
</div>
<div class="col-sm-4">
<div class="form-group row has-success">
{!! Form::label('proveedor','Proveedor')!!}
{!!Form::select('proveedor',$proveedores, null,['class'=>'form-control','name'=>'proveedor','placeholder'=>'Elije un proveedor'])!!}
</div>
</div>
</div>

<div class="row">
<div class="col-sm-3">
<div class="form-group row has-success">
{!! Form::label('preciounitario','Precio unitario.')!!}
{!!Form::number('preciounitario',null,['class'=>'form-control', 'placeholder'=>'Ej: 1000','required'=>'required', 'onKeyPress'=>'return soloNumeros(event)'])!!}
</div>
</div>
<div class="col-sm-3">
<div class="form-group row has-success">
{!! Form::label('iva','Iva.')!!}
{!!Form::number('iva',null,['class'=>'form-control', 'placeholder'=>'Ej: 19','onKeyPress'=>'return soloNumeros(event)'])!!}
</div>
</div>
<div class="col-sm-3">
<div class="form-group row has-success">
{!!Form::label('precioventa','Precio de venta.')!!}
{!!Form::number('precioventa', null,['class'=>'form-control', 'placeholder'=>'Ej: 1200', 'align'=>'center','required'=>'required','onKeyPress'=>'return soloNumeros(event)'])!!}
</div>
</div>
<div class="col-sm-3">
<div class="form-group row has-success">
{!!Form::label('stockmin','Stock minimo.')!!}
{!!Form::number('stockmin',null,['class'=>'form-control','placeholder'=>'Ej: 20 ', 'align'=>'center','required'=>'required','onKeyPress'=>'return soloNumeros(event)'])!!}
</div>
</div>
</div> 

<br>
<br>
<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-primary btn-lg btn-block'))!!}
</div> 
