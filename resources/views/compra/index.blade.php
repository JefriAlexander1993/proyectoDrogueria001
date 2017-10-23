@extends('layouts.apphome')
@section('content')
<div class="col-sm-12">
@role('admin')
   <a href="{{route('compra.create')}}" class="btn btn-success"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
   <a href="{{url('/comprapdf')}}" class="btn btn btn-secondary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>

   @endrole</div>  

   <div class="row">
   <div class="col-sm-7" style="text-align:center"><h2><strong>LISTADO DE COMPRA
   .</strong></h2>
   </div>
   <div class="col-sm-4">
   @include('compra.fragment.aside') 
   </div>
   </div> 



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
{!! Form::label('fechaLlegada','Fecha de compra.')!!}
{!!Form::date('fechaLlegada',\Carbon\Carbon::now(),['class'=>'form-control'], array('disabled'))!!}
</div>
</div>
<div class="col-sm-5">
<div class="form-group row has-success">
	{!!Form::label('cantidadAct','Cantidad Actual.')!!}
{!!Form::number('cantidadAct',null,['class'=>'form-control'])!!}

</div>
</div>
</div>

<div class="row">
<div class="col-sm-3">
<div class="form-group row has-success">
	{!! Form::label('nombre','Nombre del producto.')!!}
{!!Form::text('nombre',null,['class'=>'form-control'])!!}

</div>
</div>
<div class="col-sm-3">
<div class="form-group row has-success">
{!!Form::label('proveedor','Proveedor.')!!}
{!!Form::text('proveedor', null,['class'=>'form-control'])!!}
</div>
</div>


<div class="col-sm-2">
<div class="form-group row has-success">
{!!Form::label('precioUnitario','Precio  unitario.')!!}
{!!Form::number('precioUnitario',null,['class'=>'form-control'])!!}
</div>
</div>

                                                        

<div class="col-sm-2">
<div class="form-group row has-success">
{!!Form::label('rubio','Rubro.')!!}
{!!Form::text('rubio', null,['class'=>'form-control'])!!}
</div> 
</div> 

<div class="col-sm-2">
<div class="form-group row has-success">
{!!Form::label('totalCompra','Total de la compra.')!!}
{!!Form::number('totalCompra',null,['class'=>'form-control'])!!}
</div>
</div>
</div>
<div class="row">
<div class="col-sm-2">
<div class="form-group row has-success">
{!!Form::label('fechaVencimiento','Fecha de vencimiento')!!}
{!!Form::date('fechaVencimiento', null,['class'=>'form-control'])!!}

</div>
</div>

<div class="col-sm-2">
<div class="form-group row has-success">
{!! Form::label('iva','Iva (%).')!!}
{!!Form::number('iva',null,['class'=>'form-control'])!!}
</div> 
</div> 
<div class="col-sm-2">
<div class="form-group row has-success">
{!! Form::label('precioVenta','Precio de venta.')!!}
{!!Form::number('precioVenta',null,['class'=>'form-control'])!!}
</div> 
</div> 
<div class="col-sm-2">
<div class="form-group row has-success">
{!! Form::label('stock','Cantidad minima.')!!}
{!!Form::number('stock',null,['class'=>'form-control'])!!}
</div> 
</div> 

</div> 



</div>
</div>



@endsection