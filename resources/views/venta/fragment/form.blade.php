<div class="row">
    <input id="url_traerproducto" type="hidden" value="{{url('articulo/getArticulo/')}}">
    <input id="url_traerventa" type="hidden" value="{{url('venta/getVenta/')}}">

    <input value="0" type="hidden" id="venta" name="cantidadarticulos" class="form-control">
    <div class="col-sm-4">
        <div class="form-group">
            {!!Form:: label('totalventa','Total de venta')!!}
            <input class="form-control" id="totalVenta" name="totalVenta" readonly="readonly" value="0">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-5">
        <div class="form-group">
            {!!Form:: label('cliente_id','Cliente')!!}
            <select name="clienteid" id="cliente_idc" class="form-control" required="" title="Elige el número de de cédula'" style="width:100%">
                <option value>[Numero de cédula(*)]</option>
                @foreach($clientes as $item)
                <option value="{{$item['id']}}">
                    {{$item['nuip']}} - {{$item['primer_nombre']}} {{$item['primer_apellido']}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            {!!Form:: label('codigo','Nombre del producto')!!}

            {!!Form::select('codigo',$articulos, null,['class'=>'form-control',' required'=>'required','name'=>'codigo','id'=>'codigo','style'=>'width:100%','onKeyUp'=>'this.value = this.value.toUpperCase()','min'=>'1'])!!}
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group">
            {!!Form:: label('acción','Acción')!!}<br>
            {!!Form::button('<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;', array('type' => 'button', 'class'=>'btn btn-success btn-block','title'=>'Agregar', 'id'=>'btn-venta'))!!}
        </div>
    </div>
</div>
<hr>
<div class="row">
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
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div id="id_creditocontado">

</div>

<div class="card-footer bg-transparent ">
    {!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;', array('type' => 'sublime', 'class'=>'btn btn-success btn-lg btn-block', 'id'=>'btn_create_sale' ))!!}
</div>

