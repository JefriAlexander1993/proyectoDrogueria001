<div class="row">
    <div class="col-sm-10"><strong>EDITAR DE COMPRA.</strong></div>
    <div class="col-sm-2">
        <strong>Ir a la lista de compras:</strong>

        <a href="{{route('compra.index')}}" class="btn btn-xs btn-block btn-warning"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
     </div>

</div>
<hr>
        <input id="url_traerproducto" type="hidden" value="{{url('articulo/getArticulo/')}}">
        <input id="url_traercompra" type="hidden" value="{{url('compra/getCompra/')}}">
        <input id="url_agregar_compra_edit" type="hidden" value="{{url('compra/agregar_producto_editar_compra/')}}">
        <input type="hidden" id="id-compra" value="{{$compra->id}}">
        <div class="row">
            <div class="col-sm-5">
                <div class="form-group">
                    {!!Form::label('totalCompra','Total de compra')!!}
                    {!!Form::number('totalCompra',null,['class'=>'form-control','id'=>'totalCompra','required'=>'required', 'name'=>'totalCompra' ,'readonly'=>'readonly', 'value'=>'0','text-aling'=>'right'])!!}
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <input value="0" type="hidden" id="compra" name="cantidadarticulos" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Articulos</label>
                    {!!Form::select('codigo',$articulos, null,['class'=>'form-control',' required'=>'required','name'=>'codigo','id'=>'codigo','style'=>'width:100%','onKeyUp'=>'this.value = this.value.toUpperCase()','title'=>'Escribe el nombre del producto que deseas','disabled'])!!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Agregar articulo</label>
                    {!!Form::button('<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;', array('type' => 'button', 'class'=>'btn btn-success btn-sm btn-sm btn-block', 'id'=>'btn-add-producto-edit-compra','disabled'))!!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Editar compra</label>
                    {!!Form::button('<i class="fa fa-edit" aria-hidden="true"></i>&nbsp;', array('type' => 'button', 'class'=>'btn btn-primary btn-block','title'=>'Editar compra', 'id'=>'btn-compra-edit'))!!}
                </div>
            </div>
  

        </div>


        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-header" id="tbl-compra">
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

    <div class="card-footer bg-transparent ">
        {!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;', array('type' => 'sublime', 'id'=>'enviarCompra', 'class'=>'btn btn-success btn-lg btn-block', 'onclick'=>'confirmacion()' ))!!}
    </div>


