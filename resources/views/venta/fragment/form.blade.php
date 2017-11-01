
<input id="url_traerproducto" type="hidden" value="{{url('articulo/getArticulo/')}}">

<div class="row">
<div class="col-sm-12">
<div class="form-group">
{!!Form:: label('codigo','Codigo')!!}
{!!Form::number('codigo',null,['class'=>'form-control','id'=>'codigo'])!!}
</div>
</div>
</div>
<div class="row">
<div class="col-sm-4">
<div class="form-group">
{!!Form::button('<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Agregar', array('type' => 'button', 'class'=>'btn btn-success', 'id'=>'btn-venta'))!!}
</div>
</div>
</div>

<div class="row">
<div class="col-md-12 table-responsive">
<table class="table table-header" id="tbl-venta">
	<thead>
		<tr>
		<th class="text-center" >Codigo</th>
        <th class="text-center" style="width:10px">Cantidad</th>
		<th class="text-center">Producto</th>
		<th class="text-center">Precio unitario</th>
		<th class="text-center">Sub-Total</th>
		<th class="text-center">Iva</th>
		<th class="text-center">Total</th>
		<th class="text-center" colspan="3">Acción</th>	
        </tr>
	</thead>
	<tbody>

	</tbody>
</table>

</div>
<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;', array('type' => 'submit', 'class'=>'btn btn-primary btn-lg btn-block'))!!}
</div>
</div>