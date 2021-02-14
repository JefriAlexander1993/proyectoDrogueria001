<div class="row">
    <input id="url_traerproducto" type="hidden" value="{{url('articulo/getArticulo/')}}">
    <input id="url_traerventa" type="hidden" value="{{url('venta/getVenta/')}}">

    <input value="0" type="hidden" id="credito" name="cantidadarticulos" class="form-control">
    <div class="col-sm-4">
        <div class="form-group">
            {!!Form:: label('totalcredito','Total de credito')!!}
            <input class="form-control" id="totalcredito" name="total_credito" readonly="readonly" value="0">
        </div>
    </div>

</div>
<hr>
<div class="row">
    <div class="col-sm-5">
        <div class="form-group">
            {!!Form:: label('codigo','Codigo producto')!!}
            {!!Form::select('codigo',$articulos, null,['class'=>'form-control',' required'=>'required','name'=>'codigo','id'=>'codigo','style'=>'width:100%','onKeyUp'=>'this.value = this.value.toUpperCase()','min'=>'1'])!!}
        </div>
    </div>
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
    <div class="col-sm-2">
        <div class="form-group">
            {!!Form:: label('acción','Acción')!!}<br>
            {!!Form::button('<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;', array('type' => 'button', 'class'=>'btn btn-success btn-block','title'=>'Agregar producto', 'id'=>'btn-agregar-producto-credito'))!!}
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12 table-responsive">
            <table class="table table-header" id="tbl-credito">
                <thead>
                    <tr>
                        <th class="text-center" >#</th>
                        <th class="text-center" >Cantidad</th>
                        <th class="text-center" >Producto</th>
                        <th class="text-center" >Precio u</th>
                        <th class="text-center" >Sub-Total</th>
                        <th class="text-center" >Iva</th>
                        <th class="text-center" >Total</th>
                        <th class="text-center" >Acción</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
    </div>
</div>

<div id="id_creditocontado" >
    <div class="row">
        <div class="col-sm-12">
            <hr>
            <h5 class="text-center"><b>ESPECIFICACIONES DEL CREDITO.</b></h5>
            <hr>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label># Cuotas</label><input class="form-control" type="number" name="cantidad_de_cuotas" id="cuotas" onkeyup="valorCuotas() ">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group"><label>Valor de cuota</label>
                <input class="form-control" type="number" name="valor_de_cuota" id="valor_de_cuota" readonly="">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group"><label>Forma de pago</label>
                <select class="form-control" name="forma_de_pago" id="forma_de_pago" onchange="formapago()">
                    <option value="" selected="selected">Seleccionar..</option>
                    <option value="Diario">Diario</option>
                    <option value="Semanal">Semanal</option>
                    <option value="Quincenal">Quincenal</option>
                    <option value="Mensual">Mensual</option>
                </select></div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Observación</label>
                <textarea class="form-control" title="Observación respecto al proveedor." placeholder="Ej: El representante solo pasa los sabados a las 4pm." cols="40" rows="3" id="observacion" name="observacion"></textarea>
            </div>
        </div>
    </div>
</div>

<div class="card-footer bg-transparent ">
    {!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;', array('type' => 'sublime', 'class'=>'btn btn-success btn-lg btn-block', 'id'=>'btn_create_credit' ))!!}
</div>

