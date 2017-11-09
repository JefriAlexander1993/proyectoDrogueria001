$(document).ready(function() {
    $('#btn-venta').on('click', function() {

        if ($('#codigo').val() == '') {

            toastr.error('El campo de codigo esta vacio.', 'Venta!.')
            return false;
        }

        for (i = 0; i < listcodigo.length; i++) {
            if (listcodigo[i] == $('#codigo').val()) {

                toastr.warning('No se puede agregar el mismo codigo.', 'Venta!.')
                return false;
            }
        }

        addRowSale();
    });
});


var listcodigo = new Array();
/*  Acción del botón de compra, en el momento de añadir un articulo.  */

$(document).ready(function() {
    $('#btn-compra').on('click', function() {
        if ($('#codigo').val() == '') {

            toastr.error('El campo de codigo esta vacio.', 'Compra!.')
            return false;
        }

        for (i = 0; i < listcodigo.length; i++) {
            if (listcodigo[i] == $('#codigo').val()) {
                toastr.warning('No se puede agregar el mismo codigo.', 'Compra!.')
                return false;
            }
        }

        addRowBuy();

    });
});
var listcodigo = new Array();

/*==========================VALIDACIONES============================*/


/************    Valida  que solo permita letras ************/
function soloLetras (e){

    if (e.keyCode >45 && e.keyCode < 57)
        e.returnValue=false;
}


// function soloLetras(e) {
//     key = e.keyCode || e.which;
//     tecla = String.fromCharCode(key).toLowerCase();
//     letras = " áéíóúabcdefghijklmnñopqrstuvwxyz"; /** Estas son las letras que SI permite (abecedario normal y tildes) **/
//     especiales = [8, 37, 39, 46]; * 8 = Espacio, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha *

//     tecla_especial = false
//     for (var i in especiales) {
//         if (key == especiales[i]) {
//             tecla_especial = true;
//             break;
//         }
//     }

//     if (letras.indexOf(tecla) == -1 && !tecla_especial)
//         toastr.warning('No se puede agregar numeros en este campo.')
//     return false;
// }

/************    Valida  que solo permita numeros ************/
function soloNumeros(evt) {
    if (window.event) { //asignamos el valor de la tecla a keynum
        keynum = evt.keyCode; //IE
    } else {
        keynum = evt.which; //FF
    }
    //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
    if ((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6) {
        return true;
    } else {

        toastr.warning('No se puede agregar letras en este campo.')
        return false;
    }
}

/*************    Adicionar filas de venta    ************/
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
    <td ><a id="btn-borrar' + el.id + '" class="btn btn-danger btn-xs" onclick="deleteRow(' + el.id + ')" ><i class="fa fa-trash" ></i></a></td>\n\
    </tr>';

                    $('#tbl-venta tbody').append(row);
                    var c = parseInt($('#venta').val()) + 1;
                    $('#venta').val(c);
                    $('#totalVenta').val(parseFloat($('#totalVenta').val()) + total);

                    listcodigo.push($('#codigo').val());


                    toastr.info('Se ha agregado un articulo.', 'Venta!.')
                });

            } else {
                if (data.code === 600) {
                    toastr.error('data.error');
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

/*************    Adicionar filas de compra    ************/

function addRowBuy() {

    $.ajax({
        url: $('#url_traerproducto').val() + '/' + $('#codigo').val(),
        dataType: 'json',
        type: 'GET',
        success: function(data) {
            console.log(data);
            if (data.code === 200) {
                $(data.datos).each(function(index, el) {
                    // var totaIva = parseFloat(el.precioventa) * parseFloat(el.iva) / 100;
                    // var total = parseFloat(el.precioventa) + totaIva;
                    var row = '<tr id="fila' + el.id + '">\n\
    <td ><input readonly="readonly" type="text" id="codigo' + el.id + '" name="codigo[]" value="' + el.codigo + '"></td>\n\
    <td ><input readonly="readonly" type="text" id="nombre' + el.id + '" name="nombre[]" value="' + el.nombre + '"></td>\n\
    <td ><input style="width:100px"  type="text" id="cantidad' + el.id + '" name="cantidad[]" value="' + el.cantidad + ' "></td>\n\
    <td ><input readonly="readonly" style="width:100px" type="text" id="precio_u' + el.id + '" name="precio_u[]" value="' + el.precioventa + '"></td>\n\
    <td ><input readonly="readonly"style="width:30px" type="text" id="iva' + el.id + '" name="iva[]" value="' + el.iva + '"></td>\n\
    <td ><a id="btn-borrar' + el.id + '" class="btn btn-danger btn-xs" onclick="deleteRow(' + el.id + ')" ><i class="fa fa-trash" ></i></a></td>\n\
    </tr>';

                    $('#tbl-compra tbody').append(row);
                    var c = parseInt($('#compra').val()) + 1;
                    $('#compra').val(c);
                    // $('#totalVenta').val(parseFloat($('#totalVenta').val()) + total);

                    listcodigo.push($('#codigo').val());


                    toastr.info('Se ha agregado un articulo.', 'Venta!.')
                });

            } else {
                if (data.code === 600) {
                    toastr.error('data.error');
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


/************ Totaliza todos los valores de la fila agregada ************/
function totalizar(id) {

    var cantidad = $('#cantidad' + id).val();
    if (cantidad != '') {

        var precio = $('#precio_u' + id).val();

        var subtotal = parseFloat(precio) * parseFloat(cantidad);
        $('#sub_t' + id).val(subtotal);

        var totalIva = (subtotal * parseFloat($('#iva' + id).val())) / 100;
        var total = subtotal + totalIva;
        $('#total' + id).val(total);


        var totalVenta = 0;
        var fila = $("#tbl-venta > tbody > tr").each(function(index, element) {
            var idfila = element.id.replace("fila", "#total");
            totalVenta += parseInt($(idfila).val());

        });
        $('#totalVenta').val(totalVenta);
    } else {
        $('#sub_t' + id).val(0);
        $('#total' + id).val(0);
    }

}

function totalizarCompra(id) {

    var cantidad = $('#cantidad' + id).val();
    if (cantidad != '') {

        var precio = $('#precio_u' + id).val();

        var subtotal = parseFloat(precio) * parseFloat(cantidad);
        $('#sub_t' + id).val(subtotal);

        var totalIva = (subtotal * parseFloat($('#iva' + id).val())) / 100;
        var total = subtotal + totalIva;
        $('#total' + id).val(total);


        var totalVenta = 0;
        var fila = $("#tbl-compra > tbody > tr").each(function(index, element) {
            var idfila = element.id.replace("fila", "#total");
            totalVenta += parseInt($(idfila).val());

        });
        $('#totalVenta').val(totalVenta);
    } else {
        $('#sub_t' + id).val(0);
        $('#total' + id).val(0);
    }

}
/*--------- Eliminar fila por medio del id-------------*/
function deleteRow(id) {

    if ($('#fila' + id).remove()) {
        total = parseFloat($('#total' + id).val());
        eliminar = parseFloat($('#totalVenta').val()) - total;
        if (isNaN(eliminar)) {

            $('#totalVenta').val(0);

            $('#codigo').val('');

        } else {
            $('#totalVenta').val(eliminar);

        }

        toastr.success('Se ha eliminado correctamente', '!El articulo.')

        for (i = 0; i < listcodigo.length; i++) {
            if (listcodigo[i] == id) {

                listcodigo.splice(i);
                $('#venta').val(i) - 1;
                return false;

            }
        }
    }
}




/************   Cuando se vaya a guarda primero se consulta que el contador sea mayor a cero si no es asi,
                                 se envia un mersaje y se cancela el guardado ************/
$('#enviarVenta').on("click", function() {
    if ($('#venta').val() < 1) {

        toastr.warning('No se puede agregar la venta', '!No hay ningun articulo agregado.')
        return false;

    }
});

$('#enviarCompra').on("click", function() {
    if ($('#compra').val() < 1) {

        toastr.warning('No se puede agregar la compra', '!No hay ningun articulo agregado.')
        return false;

    }
});


