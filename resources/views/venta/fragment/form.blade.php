
<div class="form-group">
{!!Form:: label('cantidad','Cantidad')!!}
{!!Form::number('cantidad',null,['class'=>'form-control'])!!}
</div>

                                     
<!--Cantidad -->
<div class="form-group">
{!!Form:: label('codigo','Codigo')!!}
{!!Form::number('codigo',null,['class'=>'form-control'])!!}
</div>


<!-- Fecha vencimiento -->
<div class="form-group">
{!! Form:: label('nombre','Nombre')!!}
{!!Form::text('nombre', null,['class'=>'form-control'])!!}
</div>

<!-- iva -->
<div class="form-group">
{!! Form:: label('precioUnitario',' Precio unitario')!!}
{!!Form::number('precioUnitario',null,['class'=>'form-control'])!!}
</div>


<div class="form-group text-center">
{!!Form::button('<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}
</div>