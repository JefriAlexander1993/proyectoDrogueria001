<input id="url_traerproducto" type="hidden" value="{{url('articulo/getArticulo/')}}">
<input id="url_traerventa" type="hidden" value="{{url('venta/getVenta/')}}">
<input id="url_agregar_venta_edit" type="hidden" value="{{url('venta/agregar_producto_editar_venta/')}}">

<input type="hidden" id="id-venta" value="{{$venta->id}}">
<input value="0" type="hidden" id="cantidad_articulo_agregar" name="cantidad_articulo_agregar" class="form-control">
<input name="cliente_venta" value="{{$clienteventa->id}}" type="hidden">
<h5 align="center"><strong>INFORMACION DE LA VENTA</strong></h5>
<div class="row">

    <hr>
    <div class="col-sm-3">

        <strong>Nuip del cliente</strong>
        <p>{{$clienteventa->nuip}}</p>
    </div>
    <div class="col-sm-3">
        <strong>Primer nombre del cliente</strong>
        <p>{{$clienteventa->primer_nombre}}</p>
    </div>
    <div class="col-sm-3">
        <strong>Primer apellido del cliente</strong>
        <p>{{$clienteventa->primer_apellido}}</p>

    </div>
    <div class="col-sm-3">

        <strong>Editar venta</strong><br>
        {!!Form::button('<i class="fa fa-edit" aria-hidden="true"></i>&nbsp;', array('type' => 'button', 'class'=>'btn btn-primary btn-block','title'=>'Editar venta', 'id'=>'btn-venta-edit'))!!}

    </div>

</div>
<hr>
<div class="row" id="row-editarventa">
    <div class="col-sm-4">
        <strong>Total de venta</strong>
        <input class="form-control" id="totalVenta" name="totalVenta" readonly="readonly" value="0">
    </div>
    <div class="col-sm-4">
        <strong>Codigo</strong><br>
        {!!Form::select('articulos',$articulos, null,['class'=>'form-control','title'=>'Elige tu codigo.', 'name'=>'codigo','id'=>'codigo','style'=>'width:100%','disabled'])!!}
    </div>
    <div class="col-sm-4">
        <strong>Agregar producto</strong>
        {!!Form::button('<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;', array('type' => 'button', 'class'=>'btn btn-success btn-block','title'=>'Agregar producto', 'id'=>'btn-add-producto-edit','disabled'))!!}

    </div>
</div>
<hr>
<div class="row" id="row-tableventa">
    <div class="col-sm-12 table-responsive-sm">
        <table class="table table-sm" id="tbl-venta">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Producto</th>
                    <th class="text-center">Precio u</th>
                    <th class="text-center">Sub-Total</th>
                    <th class="text-center">Iva</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<div class="card-footer bg-transparent " id="btn-tablaventa">

    {!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;', array('type' => 'sublime', 'class'=>'btn btn-success btn-lg btn-block', 'id'=>'btn_create_sale' ))!!}

</div>

