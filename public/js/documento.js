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
$(document).ready(function() {
    $('#btn-compra').on('click', function() {
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

        addRowBuy();

    });
});


var listcodigo = new Array();


function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

    return true;
}


function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        toastr.warning('No se puede agregar numeros, solo caracteres en este campo.')
        return false;
    }
}
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
        toastr.warning('Unicamente permite ingresar numeros.')
        return false;
    }
}

<<<<<<< HEAD
function Numeros(string){//Solo numeros positivos
    var out = '';
    var filtro = '1234567890';//Caracteres validos
    
    //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
             //Se añaden a la salida los caracteres validos
         out += string.charAt(i);
    
    //Retornar valor filtrado
    return out;
} 

function Cantidad(string){//Solo numeros positivos
=======
function Numeros(string) { //Solo numeros
>>>>>>> 1fbce8807dc52fa6126eddc409043131728afb35
    var out = '';
    var filtro = '1234567890'; //Caracteres validos

    //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
    for (var i = 0; i < string.length; i++)
        if (filtro.indexOf(string.charAt(i)) != -1)
        //Se añaden a la salida los caracteres validos
            out += string.charAt(i);

        //Retornar valor filtrado
    return out;
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
    <td getCompraById(><input readonly="readonly" style="border:none;text-align:center"  type="text" id="codigo' + el.id + '" name="codigo[]" value="' + el.codigo + '"></td>\n\
    <td align="center"><input min="1" required style="width:50px;border:none;text-align:center"  type="number" id="cantidad' + el.id + '" name="cantidad[]" onkeyup="totalizar(' + el.id + ');isNumberKey(event); this.value=Numeros(this.value)" value="1"></td>\n\
    <td align="center"><input style="border:none;text-align:center" readonly="readonly"   type="text" id="nombre' + el.id + '" name="nombre[]" value="' + el.nombre + '"></td>\n\
    <td align="center"><input readonly="readonly" style="width:80px;border:none;text-align:center" type="text" id="precio_u' + el.id + '" name="precio_u[]" value="' + el.precioventa + '"></td>\n\
    <td align="center"><input readonly="readonly"  style="width:100px;border:none;text-align:center" type="text" id="sub_t' + el.id + '" name="sub_t[]" value="' + el.precioventa + '"></td>\n\
    <td align="center"><input readonly="readonly"  style="width:30px;border:none;text-align:center" type="text" id="iva' + el.id + '" name="iva[]" value="' + el.iva + '"></td>\n\
    <td align="center"><input readonly="readonly" style="width:80px;border:none;text-align:center" type="text" step="0.01" id="total' + el.id + '" name="total[]" value="' + total + '"></td>\n\
    <td align="center"><a style="text-align:center" id="btn-borrar' + el.id + '" class="btn btn-danger btn-xs" onclick="deleteRow(' + el.id + ')" ><i class="fa fa-trash" ></i></a></td>\n\
    </tr>';

                    $('#tbl-venta tbody').append(row);
                    var c = parseInt($('#venta').val()) + 1;
                    $('#venta').val(c);
                    $('#totalVenta').val(parseFloat($('#totalVenta').val()) + total);
                    listcodigo.push($('#codigo').val());
                    toastr.info('Solo se puede modificar el campo de Cantidad!.')
                    toastr.success('Se ha agregado un articulo a la Venta!.')
                    });

            } else {
                if (data.code === 600) {
<<<<<<< HEAD
                    toastr.error('No se encuentra el codigo digitado.');
=======
                    toastr.error('No exite un articulo relacionado con ese codigo.');
>>>>>>> 1fbce8807dc52fa6126eddc409043131728afb35
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
                    var totaIva = parseFloat(el.precioventa) * parseFloat(el.iva) / 100;
                    var total = parseFloat(el.precioventa) + totaIva;
                    var row = '<tr id="fila' + el.id + '">\n\
    <td align="center"><input readonly="readonly" style="border:none;text-align:center" readonly="readonly" type="text" id="codigo' + el.id + '" name="codigo[]" value="' + el.codigo + '"></td>\n\
    <td align="center"><input readonly="readonly" style="border:none;text-align:center" readonly="readonly" type="text" id="nombre' + el.id + '" name="nombre[]" value="' + el.nombre + '"></td>\n\
    <td align="center"><input style="border:none;text-align:center" required  type="number" id="cantidad' + el.id + '" min="1" pattern="^[0-9]+" name="cantidad[]" name="cantidad[]" onkeyup="totalizarCompra(' + el.id + ');isNumberKey(event); this.value=Numeros(this.value)" value="1"></td>\n\
    <td align="center"><input style="border:none;text-align:center" readonly="readonly" type="text" id="precio_u' + el.id + '" name="precio_u[]" value="' + el.precioventa + '"></td>\n\
    <td align="center"><input readonly="readonly"  style="width:100px;border:none;text-align:center" type="text" id="sub_t' + el.id + '" name="sub_t[]" value="' + el.precioventa + '"></td>\n\
    <td align="center"><input readonly="readonly" style="border:none;text-align:center" readonly="readonly"style="width:30px" type="text" id="iva' + el.id + '" name="iva[]" value="' + el.iva + '"></td>\n\
    <td align="center"><input readonly="readonly" style="border:none;text-align:center" type="text" step="0.01" id="total' + el.id + '" name="total[]" value="' + total + '"></td>\n\
    <td align="center"><a id="btn-borrar' + el.id + '" class="btn btn-danger btn-xs" onclick="deleteRow(' + el.id + ')" ><i class="fa fa-trash" ></i></a></td>\n\
    </tr>';

                    $('#tbl-compra tbody').append(row);
                    var c = parseInt($('#compra').val()) + 1;
                    $('#compra').val(c);
                    $('#totalCompra').val(parseFloat($('#totalCompra').val()) + total);


                    listcodigo.push($('#codigo').val());
                    toastr.info('Solo se puede modificar el campo de Cantidad!.')
                    toastr.success('Se ha agregado un articulo en Compra!.')




                });

            } else {
                if (data.code === 600) {
<<<<<<< HEAD
                    toastr.error('No se encuentra el codigo digitado');
=======
                    toastr.error('No existe un articulo relacionado con ese codigo.');
>>>>>>> 1fbce8807dc52fa6126eddc409043131728afb35
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

        var subtotal = parseFloat(precio).toFixed(2) * parseFloat(cantidad).toFixed(2);
        $('#sub_t' + id).val(subtotal);

        var totalIva = (subtotal * parseFloat($('#iva' + id).val()).toFixed(2)) / 100;
        var total = subtotal + totalIva;
        $('#total' + id).val(total);


        var totalVenta = 0;
        var fila = $("#tbl-venta > tbody > tr").each(function(index, element) {
            var idfila = element.id.replace("fila", "#total"); /*Debe ser este*/
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


        var totalCompra = 0;
        var fila = $("#tbl-compra > tbody > tr").each(function(index, element) {
            var idfila = element.id.replace("fila", "#total");
            totalCompra += parseInt($(idfila).val());

        });
        $('#totalCompra').val(totalCompra);
    } else {
        $('#sub_t' + id).val(0);
        $('#total' + id).val(0);
    }

}
/*--------- Eliminar fila por medio del id-------------*/
function deleteRow(id, e) {

    if ($('#fila' + id).remove()) {
        file = $('#venta').val() - 1;
        filec = $('#compra').val() - 1;
        $('#venta').val(file)
        $('#compra').val(filec)
        $('#codigo').val('');
        var totalVenta = 0;
        var fila = $("#tbl-venta > tbody > tr").each(function(index, element) {
            var idfila = element.id.replace("fila", "#total"); /*Debe ser este*/
            totalVenta = parseInt($(idfila).val());

        });
        $('#totalVenta').val(totalVenta);

        listcodigo.pop();


        if (isNaN(totalVenta)) {
            $('#totalVenta').val(0);
        } else {
            $('#totalVenta').val(e);

        }
        toastr.success('Se ha eliminado correctamente', '!El articulo.')


        $('#totalVenta').val(totalVenta);

        for (i = 0; i < listcodigo.length; i++) {
            if (listcodigo[i] == id) {

                listcodigo.splice(i);
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

        toastr.warning('No se puede agregar la venta', '!No hay ningun articulo agregado.')
        return false;
    }
});



$('#enviarCompra').on("click", function() {
    if ($('#compra').val() < 1) {

        toastr.warning('No se puede agregar la compra', '!No hay ningun articulo agregado.')
        return false;

        toastr.warning('No se puede agregar la venta', '!No hay ningun articulo agregado.')
        return false;
    }
});

// function fechavencimiento() {

//     if ($('#fecha').val() == $('#fechavencimiento').val()) {
//         $("#tr").css({ 'background': 'yellow' });
//         // toastr.warning('El articulo (medicamento)', '!Debe ser retirado.')
//     }
// }