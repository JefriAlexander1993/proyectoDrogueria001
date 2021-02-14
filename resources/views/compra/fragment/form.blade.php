
<input id="url_traerproducto" type="hidden" value="{{url('articulo/getArticulo/')}}">


<div class="row">
    <div class="col-sm-8">
        <div class="form-group">
            {!!Form::select('codigo',$articulos, null,['class'=>'form-control',' required'=>'required','name'=>'codigo','id'=>'codigo','style'=>'width:100%','onKeyUp'=>'this.value = this.value.toUpperCase()','min'=>'1'])!!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!!Form::button('<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;', array('type' => 'button', 'class'=>'btn btn-success btn-sm btn-sm btn-block', 'id'=>'btn-agregar-producto-compra'))!!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-11">
        <div class="form-group">
            {!!Form::label('totalCompra','Total de compra')!!}
            {!!Form::number('totalCompra',null,['class'=>'form-control','id'=>'totalCompra', 'name'=>'totalCompra' ,'readonly'=>'readonly', 'value'=>'0',])!!}
        </div>
    </div>
    <div class="col-sm-1">
        <div class="form-group">
            <input value="0" type="hidden" id="compra" name="cantidadarticulos" class="form-control">
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

