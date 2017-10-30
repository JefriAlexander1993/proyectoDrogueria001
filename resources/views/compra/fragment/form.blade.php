
<?php 
 use Illuminate\Support\Facades\DB;
 
?>

<div class="row">
<div class="col-sm-2">
<div class="form-group row has-success">
{!! Form::label('fechacompra','FechaCompra.')!!}
{!!Form::date('fechacompra',\Carbon\Carbon::now(),['class'=>'form-control' , 'placeholder'=>'Ej: 24/10/17'])!!}
</div>
</div>
<div class="col-sm-3">
<div class="form-group row has-success">
{!! Form::label('codigo_id','Codigo.')!!}
{!!Form::number('codigo_id',null,['class'=>'form-control' , 'placeholder'=>'Ej: 23232'])!!}
</div>
</div>

<div class="col-sm-4">
<div class="form-group row has-success">
{!! Form::label('nombre','Nombre.')!!}
{!!Form::number('nombre',null,['class'=>'form-control'])!!}
</div>
</div>

<div class="col-sm-3">
<div class="form-group row has-success">
{!! Form::label('valorunitario','Valor unitario.')!!}
{!!Form::number('valorunitario',null,['class'=>'form-control', 'placeholder'=>'Ej: 1000'])!!}
</div>
</div>
</div>

<div class="row">
<div class="col-sm-4 text-center">
<div class="form-group row has-success">
{!! Form::label('cantidad','Cantidad.')!!}
{!!Form::number('cantidad',null,['class'=>'form-control','placeholder'=>'Ej: 3'], array('disabled'))!!}
</div>
</div>
<div class="col-sm-4  text-center ">
<div class="form-group row has-success text-center">
{!! Form::label('iva','Iva (%).')!!}
{!!Form::number('iva',null,['class'=>'form-control', 'placeholder'=>'7'])!!}
</div> 
</div> 
<div class="col-sm-4 text-center">
<div class="form-group row has-success text-center">
{!! Form::label('valortotal','Valor total.')!!}
{!!Form::number('valortotal',null,['class'=>'form-control' , 'placeholder'=>'3'])!!}
</div> 
</div> 
</div> 

<br>
<br>
<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-primary btn-lg btn-block'))!!}
</div> 

