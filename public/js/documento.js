$(document).ready(function() {
    $('#btn-venta').on('click', function() {
        addRowSale();
    });
});

function addRowSale() {
    $.ajax({
        url: $('#url_traerproducto').val() + '/' + $('#codigo').val(),
        dataType: 'json',
        type: 'GET',
        success: function(data) {
            console.log(data);
            if (data.code === 200) {
                $(data.datos).each(function(index, el) {
                    var totaIva = parseFloat(el.precioventa) * parseFloat(el.iva) / 100;
                    var total = parseFloat(el.precioventa) + totaIva;
                    var row = '<tr id="fila' + el.id + '">\n\
    <td ><input readonly="readonly" type="text" id="codigo' + el.id + '" name="codigo[]" value="' + el.codigo + '"></td>\n\
    <td ><input style="width:50px"  type="text" id="cantidad' + el.id + '" name="cantidad[]" onkeyup="totalizar(' + el.id + ') " value="1"></td>\n\
    <td ><input readonly="readonly" type="text" id="nombre' + el.id + '" name="nombre[]" value="' + el.nombre + '"></td>\n\
    <td ><input readonly="readonly" style="width:100px" type="text" id="precio_u' + el.id + '" name="precio_u[]" value="' + el.precioventa + '"></td>\n\
    <td ><input readonly="readonly"function style="width:100px" type="text" id="sub_t' + el.id + '" name="sub_t[]" value="' + el.precioventa + '"></td>\n\
    <td ><input readonly="readonly"style="width:30px" type="text" id="iva' + el.id + '" name="iva[]" value="' + el.iva + '"></td>\n\
    <td ><input readonly="readonly" style="width:100px" type="text" id="total' + el.id + '" name="total[]" value="' + total + '"></td>\n\
    <td ><a id="btn-borrar' + el.id + '" class="btn btn-danger btn-xs" onclick="deleteRow(' + el.id + ')"><i class="fa fa-trash" ></i></a></td>\n\
    </tr>';

                    $('#tbl-venta tbody').append(row);

                });
                toastr.info('Se ha agregado un articulo.', 'Venta!.')
            } else {
                if (data.code === 600) {
                    toastr.error(data.error);
                } else {
                    toastr.error('error');

                }

            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

            data = {
                error: jqXHR + ' - ' + textStatus + ' - ' + errorThrown
            }
            $('#modal' + 1).modal('toggle');
            $('body').append('<div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><h4 class="modal-title" id="myModalLabel">ERROR EN TRANSACCIÓN</h4></div><div class="modal-body">' + data.error + '</div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button></div></div></div></div>');
            $('#modalError').modal({ show: true });
        }
    });

}

function addRowBuy() {
//     $.ajax({
//         url: $('#url_traercompra').val() + '/' + $('#codigo').val(),
//         dataType: 'json',
//         type: 'GET',
//         success: function(data) {
//             console.log(data);
//             if (data.code === 200) {
//                 $(data.datos).each(function(index, el) {
//                     var totaIva = parseFloat(el.precioventa) * parseFloat(el.iva) / 100;
//                     var total = parseFloat(el.precioventa) + totaIva;
//                     var row = '<tr id="fila' + el.id + '">\n\
//     <td ><input readonly="readonly" type="text" id="codigo' + el.id + '" name="codigo[]" value="' + el.codigo + '"></td>\n\
//     <td ><input readonly="readonly" type="text" id="nombre' + el.id + '" name="nombre[]" value="' + el.nombre + '"></td>\n\
//     <td ><input style="width:50px"  type="text" id="cantidad' + el.id + '" name="cantidad[]" onkeyup="totalizar(' + el.id + ') " value="' + el.cantidad +'"></td>\n\    
//     <td ><input readonly="readonly" style="width:100px" type="text" id="precio_u' + el.id + '" name="precio_u[]" value="' + el.valorunitario + '"></td>\n\
//     <td ><input readonly="readonly"style="width:30px" type="text" id="iva' + el.id + '" name="iva[]" value="' + el.iva + '"></td>\n\
//     <td ><input readonly="readonly" style="width:100px" type="text" id="total' + el.id + '" name="total[]" value="' + total + '"></td>\n\
//     </tr>';

//                     $('#tbl-compra tbody').append(row);

//                 });
//                 toastr.info('Se ha agregado un articulo.', 'Compra!.')
//             } else {
//                 if (data.code === 600) {
//                     toastr.error(data.error);
//                 } else {
//                     toastr.error('error');

//                 }

//             }
//         },
//         error: function(jqXHR, textStatus, errorThrown) {

//             data = {
//                 error: jqXHR + ' - ' + textStatus + ' - ' + errorThrown
//             }
//             $('#modal' + 1).modal('toggle');
//             $('body').append('<div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><h4 class="modal-title" id="myModalLabel">ERROR EN TRANSACCIÓN</h4></div><div class="modal-body">' + data.error + '</div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button></div></div></div></div>');
//             $('#modalError').modal({ show: true });
//         }
//     });

}


function totalizar(id) {
    var cantidad = $('#cantidad' + id).val();
    var precio = $('#precio_u' + id).val();

    var subtotal = parseFloat(precio) * parseFloat(cantidad);
    $('#sub_t' + id).val(subtotal);

    var totalIva = (subtotal * parseFloat($('#iva' + id).val())) / 100;
    var total = subtotal + totalIva;
    $('#total' + id).val(total);
}

function deleteRow(id) {

    if ($('#fila' + id).remove()) {

        toastr.success('Se ha eliminado correctamente', '!El articulo.')

    }

function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}


function numericFilter(txb) {
   txb.value = txb.value.replace(/[^\0-9]/ig, "");
}
}