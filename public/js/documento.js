$(document).ready(function() {
    $('#fecha_nuevoCobro').css('display', 'none');
    var totalCredito = $('#total_credito').val();
    $('#valor_credito').val(totalCredito);


})



$("#year_sales").select2({
    placeholder: 'Elige un año.',
    allowClear: true,
});

$("#departamento_id2").select2({
    placeholder: 'Elige un departamento.',
    allowClear: true,
});

$("#año").select2({
    placeholder: 'Elige un año.',
    allowClear: true,
});
$("#role_id1").select2({
    placeholder: 'Elige un rol.',
    allowClear: true,
});



$("#municipio_id2").select2({
    placeholder: 'Elige un municipio.',
    allowClear: true,
});

$("#id_proveedores").select2({
    placeholder: 'Elige un proveedor.',
    allowClear: true,
});
$("#codigo").select2({
    placeholder: 'Elige un producto.',
    allowClear: true,
});

$("#cliente_id").select2({
    placeholder: 'Elige un cliente.',
    allowClear: true,
});
$("#cliente_idc").select2({
    placeholder: 'Elige un cliente.',
    allowClear: true,
});
$("#clientecredito_id").select2({
    placeholder: 'Elige un cliente.',
    allowClear: true,
});

$("#departamento_id").select2({
    placeholder: 'Elige un departamento.',
    allowClear: true,
});

$("#municipio_id").select2({
    placeholder: 'Elige un municipio.',
    allowClear: true,
});


$("#role_id").select2({
    placeholder: 'Elige un rol.',
    allowClear: true,
});
$("#permission_id").select2({
    placeholder: 'Elige un permiso.',
    allowClear: true,
});


$('#permission_roles_id').DataTable({
    "responsive": true,
    "autoWidth": false,
});

$('#detalle_cliente').DataTable({
    "responsive": true,
    "autoWidth": false,
});
$('#venta_id').DataTable({
    "responsive": true,
    "autoWidth": false,
});
$('#inventario_id').DataTable({
    "responsive": true,
    "autoWidth": false,
});
$('#compra_id').DataTable({
    "responsive": true,
    "autoWidth": false,
});
$('#tablaArticulo').DataTable({
    "responsive": true,
    "autoWidth": false,
});
$('#table_proveedores_id').DataTable({
    "responsive": true,
    "autoWidth": false,
});
$('#cliente_id1').DataTable({
    "responsive": true,
    "autoWidth": false,
});
$('#abono_id').DataTable({
    "responsive": true,
    "autoWidth": false,
});
$('#credito_id').DataTable({
    "responsive": true,
    "autoWidth": false,
});
$('#tableUsuario_id').DataTable({
    "responsive": true,
    "autoWidth": false,
});
$('#tableRoles_id').DataTable({
    "responsive": true,
    "autoWidth": false,
});

$('#table_permissions_id').DataTable({
    "responsive": true,
    "autoWidth": false,
});
$('#table_role_user_id').DataTable({
    "responsive": true,
    "autoWidth": false,
});

$('#table-show-purchase').DataTable({
    "responsive": true,
    "autoWidth": false,
});


$(document).ready(load_sales_graph(2020))


function load_sales_graph(año) {
    var url = 'sales/' + año;
    $('#venta_año').val('VENTAS DEL ' + año)
    $.ajax({
        url: url,
        dataType: 'json',
        type: 'GET',

        success: function(data) {

            $('#ventasmav').remove(); // this is my <canvas> element
            $('#div_ventasmav').append('<canvas id="ventasmav"><canvas>');
            $('#ventasmah').remove(); // this is my <canvas> element
            $('#div_ventasmah').append('<canvas id="ventasmah"><canvas>');

            var valores = eval(data)
            var enero = valores[0];
            var febrero = valores[1];
            var marzo = valores[2];
            var abril = valores[3];
            var mayo = valores[4];
            var junio = valores[5];
            var julio = valores[6];
            var agosto = valores[7];
            var septiembre = valores[8];
            var octubre = valores[9];
            var noviembre = valores[10];
            var diciembre = valores[11];
            var total_venta_año = valores[12];
            var total_venta_dia = valores[13];
            var total_venta_mes = valores[14];



            if (enero == 0 && febrero == 0 && marzo == 0 && abril == 0 && mayo == 0 && junio == 0 && julio == 0 && agosto == 0 && septiembre == 0 && octubre == 0 && noviembre == 0 && diciembre == 0) {

                swal({
                    title: "Aviso!",
                    text: "No hay datos para graficar del año " + año,
                    icon: "warning",
                    button: "Cerrar!",
                });
                $('#total_venta_año').val('$ ' + 0);
                $('#total_venta_dia').val('$ ' + 0);
                $('#total_venta_mes').val('$ ' + 0);

                return 0;
                //var myChart = new Chart(ctx).Bar(datos, { responsive: true });

            } else {

                $('#total_venta_año').val('$ ' + total_venta_año);
                $('#total_venta_dia').val('$ ' + total_venta_dia);
                $('#total_venta_mes').val('$ ' + total_venta_mes);

                var ctx = document.getElementById('ventasmav');

                var ctxh = document.getElementById('ventasmah');

                var datos = {
                    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre",
                        "Noviembre", "Diciembre"
                    ],
                    datasets: [{
                            label: 'Ventas por mes',
                            data: [enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre],

                            backgroundColor: ["#102BB3", "#F7CA0F", "#0BE4F7", "#57E91C", "#E92C1C", "#E91C5A", "#B310A2", "#6B646A", "#235ADA", "#66DA23", "#F1FB56", "#FFF300"],

                        },


                    ],


                }


            }

            generate_chart(datos, 'bar', ctx);

            generate_chart(datos, 'horizontalBar', ctxh)


            swal({
                title: "Exitosamente!",
                text: "Se crearon las graficas exitosamente.!",
                icon: "success",
                button: "Cerrar!",
            });
        }


    });

}

var myChart;

function generate_chart(datos, type, ctx) {

    Chart.defaults.global.defaultFontColor = 'black';
    Chart.defaults.global.defaultFontFamily = 'Arial';
    Chart.defaults.global.defaultFontSize = 14;


    myChart = new Chart(ctx, {
        type: type,
        data: datos,
        // options: {

        //     scales: {
        //         xAxes: [{
        //             stacked: true
        //         }],
        //         yAxes: [{
        //             stacked: true
        //         }]
        //     },
        //     maintainAspectRatio: false,
        //     responsive: true,

        // }

    })

}


$('#btn-agregar-producto-credito').on('click', function() {
    if ($('#codigo').val() == '') {
        swal({
            title: "Error!",
            text: "Vuelve a intentarlo, recuerda llenar el campo de codigo, no puede estar vacio, vuelve a ingresarlo.",
            icon: "error",
            button: "Cerrar!",
        });

        return false;
    }

    for (i = 0; i < listcodigo.length; i++) {
        if (listcodigo[i] == $('#codigo').val()) {
            swal({
                title: "Error!",
                text: "No se puede agregar el mismo codigo, a una misma Venta!.",
                icon: "error",
                button: "Cerrar!",
            });

            return false;
        }
    }

    addRowCredit();

})

$('#btn-venta').on('click', function() {

    if ($('#codigo').val() == '') {
        swal({
            title: "Error!",
            text: "Vuelve a intentarlo, recuerda llenar el campo de codigo, no puede estar vacio, vuelve a ingresarlo.",
            icon: "error",
            button: "Cerrar!",
        });

        return false;
    }

    for (i = 0; i < listcodigo.length; i++) {
        if (listcodigo[i] == $('#codigo').val()) {
            swal({
                title: "Error!",
                text: "No se puede agregar el mismo codigo, a una misma Venta!.",
                icon: "error",
                button: "Cerrar!",
            });

            return false;
        }
    }

    addRowSale();

});

$('#btn-agregar-producto-compra').on('click', function() {

    if ($('#codigo').val() == '') {

        swal({
            title: "Error!",
            text: "Vuelve a intentarlo, recuerda llenar el campo de codigo, no puede estar vacio, vuelve a ingresarlo.",
            icon: "error",
            button: "Cerrar!",
        });

        return false;
    }

    for (i = 0; i < listcodigo.length; i++) {
        if (listcodigo[i] == $('#codigo').val()) {

            swal({
                title: "Error!",
                text: "No se puede agregar el mismo codigo.', 'Compra!.'",
                icon: "error",
                button: "Cerrar!",
            });
            return false;
        }
    }

    addRowBuy();

});


var listcodigo = new Array();

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

                    var row = '<tr id="fila' + el.id + '" style="font-size:15px">\n\
                    <td align="center"><input readonly="readonly" style="border:none;width:80px;text-align:center"  type="text" id="codigo' + el.id + '" name="codigo[]" value="' + el.codigo + '"></td>\n\
                    <td align="center"><input min="1" required style="width:50px;border:none;text-align:center"  type="number" id="cantidad' + el.id + '" name="cantidad[]" onkeyup="totalizar(' + el.id + '); this.value=Numeros(this.value)" value="1"></td>\n\
                    <td align="center"><input style="border:none;width:120px;text-align:center" readonly="readonly"   type="text" id="nombre' + el.id + '" name="nombre[]" value="' + el.nombre + '"></td>\n\
                    <td align="center"><input readonly="readonly" style="width:30px;border:none;text-align:center" type="text" id="precio_u' + el.id + '" name="precio_u[]" value="' + el.precioventa + '"></td>\n\
                    <td align="center"><input readonly="readonly"  style="width:50px;border:none;text-align:center" type="text" id="sub_t' + el.id + '" name="sub_t[]" value="' + el.precioventa + '"></td>\n\
                    <td align="center"><input readonly="readonly"  style="width:25px;border:none;text-align:center" type="text" id="iva' + el.id + '" name="iva[]" value="' + el.iva + '"></td>\n\
                    <td align="center"><input readonly="readonly" style="width:60px;border:none;text-align:center" type="text" step="0.01" id="total' + el.id + '" name="total[]" value="' + total + '"></td>\n\
                    <td style="text-align:center"><a style="text-align:center;width:20px;" id="btn-borrar' + el.id + '" class="btn btn-danger btn-xs" onclick="deleteRow(' + el.id + ')" ><i class="fa fa-trash-o" ></i></a></td>\n\
                    </tr>';

                    $('#tbl-venta tbody').append(row);
                    var c = parseInt($('#venta').val()) + 1;
                    $('#venta').val(c);

                    $('#totalVenta').val(parseFloat($('#totalVenta').val()) + total);
                    listcodigo.push($('#codigo').val());

                    swal({
                        title: "Tener en cuenta",
                        text: "Solo se puede modificar el campo de cantidad.",
                        icon: "success",
                        button: "Cerrar!",
                    });
                });

            } else {
                if (data.code === 600) {
                    swal({
                        title: "Aviso!",
                        text: "El codigo ingresado no consiste con los existentes",
                        icon: "info",
                        button: "Cerrar!",
                    });
                }

            }
        },
        error: function() {

            swal({
                title: "Error!",
                text: "Algo salio mal, vuelve a intentarlo",
                icon: "error",
                button: "Cerrar!",
            });
        }
    });

}
/*************    Adicionar filas de credito   ************/
function addRowCredit() {

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

                    var row = '<tr id="fila' + el.id + '" style="font-size:15px">\n\
                    <td align="center"><input readonly="readonly" style="border:none;width:80px;text-align:center"  type="text" id="codigo' + el.id + '" name="codigo[]" value="' + el.codigo + '"></td>\n\
                    <td align="center"><input min="1" required style="width:50px;border:none;text-align:center"  type="number" id="cantidad' + el.id + '" name="cantidad[]" onkeyup="totalizarcredito(' + el.id + '); isNumberKey(event); this.value=Numeros(this.value)" value="1"></td>\n\
                    <td align="center"><input style="border:none;width:120px;text-align:center" readonly="readonly"   type="text" id="nombre' + el.id + '" name="nombre[]" value="' + el.nombre + '"></td>\n\
                    <td align="center"><input readonly="readonly" style="width:30px;border:none;text-align:center" type="text" id="precio_u' + el.id + '" name="precio_u[]" value="' + el.precioventa + '"></td>\n\
                    <td align="center"><input readonly="readonly"  style="width:50px;border:none;text-align:center" type="text" id="sub_t' + el.id + '" name="sub_t[]" value="' + el.precioventa + '"></td>\n\
                    <td align="center"><input readonly="readonly"  style="width:15px;border:none;text-align:center" type="text" id="iva' + el.id + '" name="iva[]" value="' + el.iva + '"></td>\n\
                    <td align="center"><input readonly="readonly" style="width:50px;border:none;text-align:center" type="text" step="0.01" id="total' + el.id + '" name="total[]" value="' + total + '"></td>\n\
                    <td style="text-align:center"><a style="text-align:center;width:20px;" id="btn-borrar' + el.id + '" class="btn btn-danger btn-xs" onclick="deleteRow(' + el.id + ')" ><i class="fa fa-trash-o" ></i></a></td>\n\
                    </tr>';

                    $('#tbl-credito tbody').append(row);
                    var c = parseInt($('#credito').val()) + 1;
                    $('#credito').val(c);

                    $('#totalcredito').val(parseFloat($('#totalcredito').val()) + total);
                    listcodigo.push(el.codigo);

                    swal({
                        title: "Tener en cuenta",
                        text: "Solo se puede modificar el campo de cantidad.",
                        icon: "success",
                        button: "Cerrar!",
                    });
                });

            } else {
                if (data.code === 600) {
                    swal({
                        title: "Aviso!",
                        text: "El codigo ingresado no consiste con los existentes",
                        icon: "info",
                        button: "Cerrar!",
                    });
                }

            }
        },
        error: function() {

            swal({
                title: "Error!",
                text: "Algo salio mal, vuelve a intentarlo",
                icon: "error",
                button: "Cerrar!",
            });
        }
    });

}

/*************    Adicionar filas de venta edit   ************/
function addRowEditSale() {

    $.ajax({
        url: $('#url_agregar_venta_edit').val() + '/' + $('#codigo').val() + '/' + $('#id-venta').val(),
        dataType: 'json',
        type: 'GET',
        success: function(data) {
            console.log(data);
            if (data.code === 200) {
                $(data.datos).each(function(index, el) {
                    var totaIva = parseFloat(el.precioventa) * parseFloat(el.iva) / 100;
                    var total = parseFloat(el.precioventa) + totaIva;

                    var row = '<tr id="fila' + el.id_detalle + '" style="font-size:15px">\n\
                    <td align="center"><input readonly="readonly" style="border:none;width:80px;text-align:center"  type="hidden" id="id_detalle' + el.id_detalle + '" name="id_detalle[]" value="' + el.id_detalle + '">\n\
                    <input readonly="readonly" style="border:none;width:80px;text-align:center"  type="text" id="codigo' + el.id_detalle + '" name="codigo[]" value="' + el.codigo + '"></td>\n\
                    <td align="center"><input min="1" required style="width:50px;border:none;text-align:center"  type="number" id="cantidad' + el.id_detalle + '" name="cantidad[]" onkeyup="totalizar(' + el.id_detalle + ');isNumberKey(event); this.value=Numeros(this.value)" value="1"></td>\n\
                    <td align="center"><input style="border:none;width:120px;text-align:center" readonly="readonly"   type="text" id="nombre' + el.id_detalle + '" name="nombre[]" value="' + el.nombre + '"></td>\n\
                    <td align="center"><input readonly="readonly" style="width:30px;border:none;text-align:center" type="text" id="precio_u' + el.id_detalle + '" name="precio_u[]" value="' + el.precioventa + '"></td>\n\
                    <td align="center"><input readonly="readonly"  style="width:50px;border:none;text-align:center" type="text" id="sub_t' + el.id_detalle + '" name="sub_t[]" value="' + el.precioventa + '"></td>\n\
                    <td align="center"><input readonly="readonly"  style="width:15px;border:none;text-align:center" type="text" id="iva' + el.id_detalle + '" name="iva[]" value="' + el.iva + '"></td>\n\
                    <td align="center"><input readonly="readonly" style="width:50px;border:none;text-align:center" type="text" step="0.01" id="total' + el.id_detalle + '" name="total[]" value="' + total + '"></td>\n\
                    <td style="text-align:center"><a style="text-align:center;width:20px;" id="btn-borrar' + el.id_detalle + '" class="btn btn-danger btn-xs" onclick="deleteRow(' + el.id_detalle + ')" ><i class="fa fa-trash-o" ></i></a></td>\n\
                    </tr>';

                    $('#tbl-venta tbody').append(row);
                    $('cantidad_articulo_agregar');
                    var c = parseInt($('#cantidad_articulo_agregar').val()) + 1;
                    $('#cantidad_articulo_agregar').val(c);

                    $('#totalVenta').val(parseFloat($('#totalVenta').val()) + total);
                    listcodigo.push($('#codigo').val());

                    swal({
                        title: "Tener en cuenta",
                        text: "Solo se puede modificar el campo de cantidad.",
                        icon: "success",
                        button: "Cerrar!",
                    });
                });

            } else {
                if (data.code === 600) {
                    swal({
                        title: "Aviso!",
                        text: "El codigo ingresado no consiste con los existentes",
                        icon: "info",
                        button: "Cerrar!",
                    });
                }

            }
        },
        error: function() {

            swal({
                title: "Error!",
                text: "Algo salio mal, vuelve a intentarlo",
                icon: "error",
                button: "Cerrar!",
            });
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
            if (data.code === 200) {
                $(data.datos).each(function(index, el) {
                    var totaIva = parseFloat(el.precioventa) * parseFloat(el.iva) / 100;
                    var total = parseFloat(el.precioventa) + totaIva;
                    var row = '<tr id="fila' + el.id + '" style="font-size:15px">\n\
                    <td align="center"><input readonly="readonly" style="border:none;width:80px;text-align:center"  type="text" id="codigo' + el.id + '" name="codigo[]" value="' + el.codigo + '"></td>\n\
                    <td align="center"><input min="1" required style="width:50px;border:none;text-align:center"  type="number" id="cantidad' + el.id + '" name="cantidad[]" onkeyup="totalizarCompra(' + el.id + ');isNumberKey(event); this.value=Numeros(this.value)" value="1"></td>\n\
                    <td align="center"><input style="border:none;width:120px;text-align:center" readonly="readonly"   type="text" id="nombre' + el.id + '" name="nombre[]" value="' + el.nombre + '"></td>\n\
                    <td align="center"><input readonly="readonly" style="width:30px;border:none;text-align:center" type="text" id="precio_u' + el.id + '" name="precio_u[]" value="' + el.precioventa + '"></td>\n\
                    <td align="center"><input readonly="readonly"  style="width:50px;border:none;text-align:center" type="text" id="sub_t' + el.id + '" name="sub_t[]" value="' + el.precioventa + '"></td>\n\
                    <td align="center"><input readonly="readonly"  style="width:15px;border:none;text-align:center" type="text" id="iva' + el.id + '" name="iva[]" value="' + el.iva + '"></td>\n\
                    <td align="center"><input readonly="readonly" style="width:50px;border:none;text-align:center" type="text" step="0.01" id="total' + el.id + '" name="total[]" value="' + total + '"></td>\n\
                    <td style="text-align:center"><a style="text-align:center;width:20px;" id="btn-borrar' + el.id + '" class="btn btn-danger btn-xs" onclick="deleteRow(' + el.id + ')" ><i class="fa fa-trash-o" ></i></a></td>\n\
                    </tr>';

                    $('#tbl-compra tbody').append(row);
                    var c = parseInt($('#compra').val()) + 1;
                    $('#compra').val(c);
                    $('#totalCompra').val(parseFloat($('#totalCompra').val()) + total);
                    listcodigo.push($('#codigo').val());

                    swal({
                        title: "Tener en cuenta.!",
                        text: "Solo se puede modificar el campo de Cantidad",
                        icon: "success",
                        button: "Cerrar!",
                    });

                });

            } else {
                if (data.code === 600) {
                    swal({
                        title: "Aviso!",
                        text: "El codigo ingresado no consiste con los existentes",
                        icon: "info",
                        button: "Cerrar!",
                    });
                }

            }
        },
        error: function() {
            swal({
                title: "Error!",
                text: "Algo salio mal, vuelve a intentarlo",
                icon: "error",
                button: "Cerrar!",
            });

        }
    });

}
/*************    Adicionar filas de compra en editar    ************/

function addRowEditCompra() {

    $.ajax({
        url: $('#url_agregar_compra_edit').val() + '/' + $('#codigo').val() + '/' + $('#id-compra').val(),
        dataType: 'json',
        type: 'GET',
        success: function(data) {
            if (data.code === 200) {
                $(data.datos).each(function(index, el) {
                    var totaIva = parseFloat(el.precioventa) * parseFloat(el.iva) / 100;
                    var total = parseFloat(el.precioventa) + totaIva;
                    var row = '<tr id="fila' + el.id_detalle + '" style="font-size:15px">\n\
                     <td align="center"><input readonly="readonly" style="border:none;width:80px;text-align:center"  type="hidden" id="id_detalle' + el.id_detalle + '" name="id_detalle[]" value="' + el.id_detalle + '">\n\<input readonly="readonly" style="border:none;width:80px;text-align:center"  type="text" id="codigo' + el.id_detalle + '" name="codigo[]" value="' + el.codigo + '"></td>\n\
                    <td align="center"><input min="1" required style="width:50px;border:none;text-align:center"  type="number" id="cantidad' + el.id_detalle + '" name="cantidad[]" onkeyup="totalizarCompra(' + el.id_detalle + ');isNumberKey(event); this.value=Numeros(this.value)" value="1"></td>\n\
                    <td align="center"><input style="border:none;width:120px;text-align:center" readonly="readonly"   type="text" id="nombre' + el.id_detalle + '" name="nombre[]" value="' + el.nombre + '"></td>\n\
                    <td align="center"><input readonly="readonly" style="width:30px;border:none;text-align:center" type="text" id="precio_u' + el.id_detalle + '" name="precio_u[]" value="' + el.precioventa + '"></td>\n\
                    <td align="center"><input readonly="readonly"  style="width:50px;border:none;text-align:center" type="text" id="sub_t' + el.id_detalle + '" name="sub_t[]" value="' + el.precioventa + '"></td>\n\
                    <td align="center"><input readonly="readonly"  style="width:15px;border:none;text-align:center" type="text" id="iva' + el.id_detalle + '" name="iva[]" value="' + el.iva + '"></td>\n\
                    <td align="center"><input readonly="readonly" style="width:50px;border:none;text-align:center" type="text" step="0.01" id="total' + el.id_detalle + '" name="total[]" value="' + total + '"></td>\n\
                    <td style="text-align:center"><a style="text-align:center;width:20px;" id="btn-borrar' + el.id_detalle + '" class="btn btn-danger btn-xs" onclick="deleteRow(' + el.id_detalle + ')" ><i class="fa fa-trash-o" ></i></a></td>\n\
                    </tr>';

                    $('#tbl-compra tbody').append(row);
                    var c = parseInt($('#compra').val()) + 1;
                    $('#compra').val(c);
                    $('#totalCompra').val(parseFloat($('#totalCompra').val()) + total);
                    listcodigo.push(el.codigo);

                    swal({
                        title: "Tener en cuenta.!",
                        text: "Solo se puede modificar el campo de Cantidad",
                        icon: "success",
                        button: "Cerrar!",
                    });

                });

            } else {
                if (data.code === 600) {
                    swal({
                        title: "Aviso!",
                        text: "El codigo ingresado no consiste con los existentes",
                        icon: "info",
                        button: "Cerrar!",
                    });
                }

            }
        },
        error: function() {
            swal({
                title: "Error!",
                text: "Algo salio mal, vuelve a intentarlo",
                icon: "error",
                button: "Cerrar!",
            });

        }
    });

}


/************ Totaliza todos los valores de la fila agregada ************/
function totalizar(id) {

    var cantidad = $('#cantidad' + id).val();
    console.log(cantidad);

    if (cantidad != '') {

        var precio = $('#precio_u' + id).val();

        var subtotal = parseFloat(precio) * parseFloat(cantidad);
        $('#sub_t' + id).val(subtotal);

        var totalIva = (subtotal * parseFloat($('#iva' + id).val())) / 100;
        var total = subtotal + totalIva;
        console.log(total);
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

/************ Totaliza todos los valores de la fila agregada ************/
function totalizarcredito(id) {

    var cantidad = $('#cantidad' + id).val();

    if (cantidad != '') {

        var precio = $('#precio_u' + id).val();

        var subtotal = parseFloat(precio).toFixed(2) * parseFloat(cantidad).toFixed(2);
        $('#sub_t' + id).val(subtotal);

        var totalIva = (subtotal * parseFloat($('#iva' + id).val()).toFixed(2)) / 100;
        var total = subtotal + totalIva;
        $('#total' + id).val(total);


        var totalCredito = 0;
        $("#tbl-credito > tbody > tr").each(function(index, element) {
            var idfila = element.id.replace("fila", "#total"); /*Debe ser este*/
            totalCredito += parseInt($(idfila).val());

        });
        $('#totalcredito').val(totalCredito);
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

        swal({
            title: "Exito!",
            text: "Se ha eliminado correctamente, !El producto.",
            icon: "info",
            button: "Cerrar!",
        });

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
$('#btn_create_sale').on("click", function() {

    if ($('#venta').val() < 1) {
        swal({
            title: "Tener en cuenta!",
            text: "No se pueden guardar ventas sin productos",
            icon: "info",
            button: "Cerrar!",
        });

        return false;

    }

});
$('#btn_create_credit').on("click", function() {

    if ($('#credito').val() < 1) {
        swal({
            title: "Tener en cuenta!",
            text: "No se pueden guardar credito sin productos",
            icon: "info",
            button: "Cerrar!",
        });

        return false;

    }

});


$('#enviarCompra').on("click", function() {
    if ($('#compra').val() < 1) {
        swal({
            title: "Tener en cuenta!",
            text: "No se pueden guardar compras sin productos",
            icon: "info",
            button: "Cerrar!",
        });
        return false;
    }


    swal({
        title: "Exito!",
        text: "La compra se guardado, Exitosamente",
        icon: "success",
        button: "Cerrar!",
    });

});
$('#backup-id').on("click", function(e) {
    e.preventDefault();
    swal({
            title: "Por favor confirmar?",
            text: "Si desea crear una copia de seguridad de la base datos por favor dar click en SI, de lo contrario NO!",
            icon: "info",
            buttons: ["No", "Si"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                document.location.href = '/backup'
                swal("Se ha creado exitosamente la copia de seguridad!", {
                    icon: "success",
                });
            } else {

                swal({
                    icon: "error",
                    text: "Se ha cancelado la creacion de la copia de seguridad!"
                });

            }
        });

});




$("#btn-registroProveedor").on("click", function(e) {

    e.preventDefault();

    var nit = $('#nit').val();
    var nombreproveedor = $('#nombreproveedor').val();
    var nombrerepresentante = $('#nombrerepresentante').val();
    var direccion = $('#direccion').val();
    var telefono = $('#telefono').val();
    var email = $('#email').val();
    var observacion = $('#observacion').val();

    if (nit === '' || nombreproveedor === '' ||
        nombrerepresentante === '' || direccion === '' || telefono === '') {

        swal({
            title: "Error",
            text: "Algunos campos estan vacios.!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        });
        return false;

    }

    var route = "proveedor";
    var token = $("#token").val();
    $.ajax({
        url: route,
        headers: { 'X-CSRF-TOKEN': token },
        type: 'POST',
        dataType: 'json',
        data: {
            nit: nit,
            nombreproveedor: nombreproveedor,
            nombrerepresentante: nombrerepresentante,
            direccion: direccion,
            telefono: telefono,
            email: email,
            observacion: observacion
        },
        success: function(data) {
            $.each(data.errors, function(key, value) {

                $('.alert-danger').show();
                $('.alert-danger').append('<p>' + value + '</p>');
            });
            if (data.code === 200) {
                listarProveedores();
                $('#exampleModal').modal('hide');
                swal({
                    title: "Exitosamente!",
                    text: "Se ha guardado el proveedor.!",
                    icon: "success",
                    button: "Cerrar!",
                });

                $('#nit').val('');
                $('#nombreproveedor').val('');
                $('#nombrerepresentante').val('');
                $('#direccion').val('');
                $('#telefono').val('');
                $('#email').val('');
                $('#observacion').val('');

            }
            if (data.code === 500) {

                $.each(data.errors, function(key, value) {

                    $('.alert-danger').show();
                    $('.alert-danger').append('<p>' + value + '</p>');
                });

                return false;
            }

        }

    });

});

function listarProveedores() {
    var route = "proveedores";
    var datos = $('#id_proveedor');

    $.get(route, function(response) {
        $(response).each(function(key, value) {

            datos.append(
                "<tr>\n\
                    <td align='center'>" + value.nit + " </td>\n\
                    <td align='center'>" + value.nombreproveedor + " </td>\n\
                    <td align='center'>" + value.nombrerepresentante + "</td> \n\
                    <td align='center'>" + value.direccion + " </td> \n\
                    <td align='center'>" + value.telefono + " </td>\n\
                    <td align='center'>" + value.email + " </td>\n\
                    <td align='center'>" + value.observacion + " </td>\n\
                    <td ><a class='btn btn-sm btn-default' id='btn-verProveedor'><i class='fa fa-eye' aria-hidden='true'></i></a></td>\n\
                    <td ><button class='btn btn-sm btn-primary' id='actualizarProveedor' ><i  class='far fa-edit' aria-hidden='true'></i></button></td>\n\
                    <td ><a class='btn btn-sm btn-danger'  id='btn-eliminarProveedor'><i class='fas fa-trash' aria-hidden='true'></i></a></td>\n\
                    </tr>"

            );
        });

    });
}




function valorCuotas() {

    var totalc = parseFloat($('#totalcredito').val());
    var cuota = $('#cuotas').val();
    valorCuota = totalc / cuota;
    var resultado = Math.round(valorCuota * 100) / 100;
    $('#valor_de_cuota').val(parseFloat(resultado));
}


function valorActual() {
    var totalv = $('#valor_credito').val();
    var cuota = $('#valor_abono').val();
    valorCuota = totalv - cuota;
    var resultado = Math.round(valorCuota * 100) / 100;
    $('#saldo_actual').val(parseFloat(resultado));
    $('#observacion').val('Abono');

    if (totalv == cuota) {
        $('#observacion').val('Cancelado');

    }

}



var cuo = $('#cuotas_atrasadas').val();

function observacion_credito() {

    var observacion = $('#observacion').val();


    if ((observacion === 'No abono') || (observacion === 'Aplazada')) {


        if (observacion === 'No abono') {

            o = parseInt($('#observacion1').val());
            if (o == 1) {
                return false;
            } else {

                var c = parseInt($('#cuotas_atrasadas').val());
                var ca = c + 1;
                var obA = $('#cuotas_atrasadas').val(ca);
                $('#fecha_nuevoCobro').show();
                $('#observacion1').val(1);
            }

        }
        if (observacion === 'Aplazada') {

            op = parseInt($('#observacion1').val());
            if (op == 1) {
                return false;
            } else {
                var cat = parseInt(cuo) + 1;
                var obA = $('#cuotas_atrasadas').val(cat);
                $('#fecha_nuevoCobro').show();
                $('#observacion1').val(1);
            }

        }

        $('#fecha_nuevoCobro').show();
        $('#valor_abono').val(0);

        var totalv = $('#valor_credito').val();
        $('#saldo_actual').val(totalv);

    }
    if (observacion === 'Abono') {
        var abono = $('#valor_abono').val();
        if (abono == 0) {

            swal({
                title: "Error!",
                text: "Recuerde llenar el cambo de valor abono.!",
                icon: "warning",
                button: "Cerrar!",
            });

            $('#observacion').val('');
            $('#observacion1').val(0);
            return false;

        }

        parseInt($('#cuotas_atrasadas').val($('#cuotas_atrasadas').val()));
        $('#observacion1').val(0);
        $('#fecha_nuevoCobro').hide();

    }
    if (observacion === 'Cancelado') {
        var ca = $('#cuotas_atrasadas').val();

        if (ca > cuo) {

            var oper = ca - 1;
            $('#cuotas_atrasadas').val(parseInt(oper));
        } else {

            parseInt($('#cuotas_atrasadas').val(cuo));
        }

        var totalv = $('#valor_credito').val();
        $('#valor_abono').val(totalv);
        $('#saldo_actual').val(0);
        $('#fecha_nuevoCobro').hide();

        $('#observacion1').val(0);

    }



}

// Busqueda de cliente.

$('#btn-seach').on('click', function() {
    var ext = $('#url_clientseach').val();
    var doc_number = $('#nuipClient').val();
    var url = ext + '/' + doc_number;
    $.ajax({
        url: url,
        dataType: 'json',
        type: 'GET',
        success: function(data) {
            if (data.code === 200) {
                $(data.datos).each(function(index, el) {

                    $('#primer_nombre').val(el.primer_nombre);
                    $('#segundo_nombre').val(el.segundo_nombre);
                    $('#primer_apellido').val(el.primer_apellido);
                    $('#segundo_apellido').val(el.segundo_apellido);
                    $('#correoelectronico').val(el.correoelectronico);
                    //$('#').val(el.primer_apellido);
                    $('#cliente_id').val(el.id);


                });

                swal({

                    title: "Éxito.",
                    text: "Se han cargado datos del cliente exitosamente.",
                    icon: "success",
                    buttons: false,
                    timer: 3000,

                });

            }
            if (data.code === 600) {
                swal({
                    title: "Advertencia.",
                    text: "El documento de identidad ingresado no conside con ninguno de los clientes registrado.",
                    icon: "info",
                    dangerMode: true,



                });
                return false;
            }



        }

    });

});


// Busqueda del credito

$('#btn-seachcredito').on('click', function() {

    var ext = $('#url_traercredito').val();
    var doc_number = $('#cliente_idc').val();
    var url = ext + '/' + doc_number;
    var div = $('#tbl-credito tbody');


    if (!doc_number) {

        swal({
            title: "Advertencia.",
            text: "Se requiere un documento de identidad para realizar la consulta de credito.",
            icon: "info",
            dangerMode: true,
        });
        return 0;


    }



    $.ajax({
        url: url,
        dataType: 'json',
        type: 'GET',
        success: function(data) {
            if (data.code === 200) {

                $(data.datosaabono_cliente).each(function(index, el) {


                    if (el.saldo_actual < 0 || el.cuotas_restantes < 0) {

                        sa = el.saldo_actual * 0
                        $('#saldo_actual').val(sa);

                        v = el.cuotas_restantes * 0
                        $('#cuotas_restantes').val(v);

                    }

                });

                $(data.datoscredito_cliente).each(function(index, el) {


                    if (el.saldo_actual > 0) {


                        $('#saldo_actual').val(el.saldo_actual);
                        $('#cuotas_restantes').val(el.cuotas_restantes);
                        $('#id_abono').css('display', 'block')

                        swal({
                            title: "Exitosamente!",
                            text: "Se ha agregado el exitosamente el credito.!",
                            icon: "success",
                            button: "Cerrar!",
                        });

                    } else {

                        swal({
                            title: "Advertencia.",
                            text: "El documento de identidad ingresado no tiene saldos pendientes, por favor ingresar otro.",
                            icon: "info",
                            dangerMode: true,
                        });
                        return 0;
                    }


                });

                $(data.datoscredito).each(function(index, el) {

                    $('#total_credito').val(el.total_credito);
                    $('#valor_de_cuota').val(el.valor_de_cuota);
                    $('#cantidad_de_cuotas').val(el.cantidad_de_cuotas);

                });


            }
            if (data.code === 500) {
                swal({
                    title: "Advertencia.",
                    text: "El cliente no tiene asociado ningun credito, por el momento.",
                    icon: "info",
                    dangerMode: true,
                });
                return false;
            }



        }

    });

});


$('#btn-calcular').on('click', function() {
    var saldo_actual = $('#saldo_actual').val();
    var sa = $('#saldo_actual').val();
    var valor_abono = $('#valor_abono').val();
    var cuota_actual = $('#cantidad_de_cuotas').val();
    var cuota_numero = $('#cuota_numero').val();
    var cuotas_restantes = cuota_actual - cuota_numero;
    var saldo_pendiente = saldo_actual - valor_abono;

    if (valor_abono == '' || cuota_numero == '') {

        swal({
            title: "Tener en cuenta.",
            text: "El campo valor de abono y cuota numero, debe estar diligenciado.",
            icon: "info",
            dangerMode: true,
        });
        return false;
    } else
    if (cuotas_restantes < 0 || cuotas_restantes > cuota_actual) {

        swal({
            title: "Tener en cuenta.",
            text: "El campo cuota numero, debe ser menor que la cantidad de cuotas establecidas.",
            icon: "info",
            dangerMode: true,
        });
        $('#cuota_numero').val('');
        $('#cuotas_restantes').val(cuota_actual);
        return false;
    } else {

        $('#saldo_actual').val(saldo_pendiente);
        $('#cuotas_restantes').val(cuotas_restantes);
    }

})



//------------------------------------Plantilla


// const contenedor = document.querySelector('#contenedor');

// $('#boton-menu').click(() => {

//     contenedor.classList.toggle('active');

// })

// const comprobarAncho = () => {

//     if (window.innerWidth <= 768) {

//         contenedor.classList.remove('active')
//     } else {

//         contenedor.classList.add('active')

//     }
// }

// comprobarAncho()

// window.addEventListener('resize', () => {

//         comprobarAncho()

//     })
//     //La que esta funcionando
//     /*************    Adicionar filas de editar venta    ************/
function cargarVenta() {


    $.ajax({
        url: $('#url_traerventa').val() + '/' + $('#id-venta').val(),
        dataType: 'json',
        type: 'GET',
        success: function(data) {

            if (data.code === 200) {
                // $('#btn_create_sale').remove();
                // var btntablaventa = '<button type = "sublime"  class=" btn btn-verde btn-lg btn-block"  id="btn_create_sale" ><i class="fa fa-floppy-o" aria-hidden="true"></i></button>';

                // $('#btn-tablaventa').append(btntablaventa);

                // $(data.articulos).each(function(index, el) {

                //     var option = '<option value ="' + el.id + '">' + el.nombre + '</option>';
                //     $('#codigo').append(option);

                // });

                $("#codigo").select2({
                    placeholder: 'Elige un producto.',
                    allowClear: true,
                });


                //* $(data.datosaabono_cliente).each(function(index, el) {
                $('#cliente_idc').val()
                $('#tbl-venta tbody').html("");
                $(data.detalles).each(function(index, el) {

                    var totaIva = parseFloat(el.precioventa) * parseFloat(el.iva) / 100;

                    var total = parseFloat(el.precioventa) + totaIva;

                    var row = '<tr id="fila' + el.id_detalle + '" style="font-size:15px">\n\
                      <td align="center"><input readonly="readonly" style="border:none;width:80px;text-align:center"  type="hidden" id="id_detalle' + el.id_detalle + '" name="id_detalle[]" value="' + el.id_detalle + '">\n\
                      <input readonly="readonly" style="border:none;width:80px;text-align:center"  type="text" id="codigo' + el.id_detalle + '" name="codigo[]" value="' + el.codigo + '"></td>\n\
                      <td align="center"><input min="1" required style="width:50px;border:none;text-align:center"  type="number" id="cantidad' + el.id_detalle + '" name="cantidad[]" onkeyup="totalizar(' + el.id_detalle + ');isNumberKey(event); this.value=Numeros(this.value)" value="' + el.cantidad + '"></td>\n\
                      <td align="center"><input style="border:none;width:120px;text-align:center" readonly="readonly"   type="text" id="nombre' + el.id_detalle + '" name="nombre[]" value="' + el.nombre + '"></td>\n\
                      <td align="center"><input style="border:none;width:120px;text-align:center" readonly="readonly"   type="text" id="precio_u' + el.id_detalle + '" name="precio_u[]" value="' + el.preciounitario + '"></td>\n\
                      <td align="center"><input readonly="readonly"  style="width:50px;border:none;text-align:center" type="text" id="sub_t' + el.id_detalle + '" name="sub_t[]" value="' + el.precioventa + '"></td>\n\
                      <td align="center"><input readonly="readonly"  style="width:15px;border:none;text-align:center" type="text" id="iva' + el.id_detalle + '" name="iva[]" value="' + el.iva + '"></td>\n\
                      <td align="center"><input readonly="readonly" style="width:50px;border:none;text-align:center" type="text" step="0.01" id="total' + el.id_detalle + '" name="total[]" value="' + total + '"></td>\n\
                      <td style="text-align:center"><a style="text-align:center;width:20px;" id="btn-borrar' + el.id_detalle + '" class="btn btn-danger btn-xs" onclick="deleteRow(' + el.id_detalle + ')" ><i class="fa fa-trash-o" ></i></a></td>\n\
                      </tr>';

                    $('#tbl-venta tbody').append(row);

                    $('#row-editar-venta').remove();
                    $("#datos-cliente-editar-venta").removeClass("col-sm-8");
                    $("#datos-cliente-editar-venta").addClass("col-sm-12");

                    var c = parseInt($('#venta').val()) + 1;
                    $('#venta').val(c);
                    $('#totalVenta').val(parseFloat($('#totalVenta').val()) + total);
                    listcodigo.push(el.codigo);


                });

                swal({
                    title: "Tener en cuenta",
                    text: "Solo se puede modificar el campo de cantidad.",
                    icon: "success",
                    button: "Cerrar!",
                });


            }
            if (data.code === 600) {
                swal({
                    title: "Aviso!",
                    text: "El codigo ingresado no consiste con los existentes",
                    icon: "info",
                    button: "Cerrar!",
                });
            }
        },
        error: function() {

            swal({
                title: "Error!",
                text: "Algo salio mal, vuelve a intentarlo",
                icon: "error",
                button: "Cerrar!",
            });
        }
    });

}

//La que esta funcionando
/*************    Adicionar filas de editar compra    ************/
function cargarCompra() {


    $.ajax({
        url: $('#url_traercompra').val() + '/' + $('#id-compra').val(),
        dataType: 'json',
        type: 'GET',
        success: function(data) {

            if (data.code === 200) {
                // var btntablaventa = '<button type = "sublime"  class=" btn btn-verde btn-lg btn-block"  id="btn_create_sale" ><i class="fa fa-floppy-o" aria-hidden="true"></i></button>';

                // $('#btn-tablaventa').append(btntablaventa);

                // $(data.articulos).each(function(index, el) {

                //     var option = '<option value ="' + el.id + '">' + el.nombre + '</option>';
                //     $('#codigo').append(option);

                // });

                // $("#codigo").select2({
                //     placeholder: 'Elige un producto.',
                //     allowClear: true,
                // });


                //* $(data.datosaabono_cliente).each(function(index, el) {
                $('#cliente_idc').val()
                $('#tbl-com´ra tbody').html("");
                $(data.detalles).each(function(index, el) {

                    var totaIva = parseFloat(el.preciounitario) * parseFloat(el.iva) / 100;

                    var total = parseFloat(el.preciounitario) + totaIva;

                    var row = '<tr id="fila' + el.id_detalle + '" style="font-size:15px">\n\
                          <td align="center"><input readonly="readonly" style="border:none;width:80px;text-align:center"  type="hidden" id="id_detalle' + el.id_detalle + '" name="id_detalle[]" value="' + el.id_detalle + '">\n\
                          <input readonly="readonly" style="border:none;width:80px;text-align:center"  type="text" id="codigo' + el.id_detalle + '" name="codigo[]" value="' + el.codigo + '"></td>\n\
                          <td align="center"><input min="1" required style="width:50px;border:none;text-align:center"  type="number" id="cantidad' + el.id_detalle + '" name="cantidad[]" onkeyup="totalizarCompra(' + el.id_detalle + ');isNumberKey(event); this.value=Numeros(this.value)" value="' + el.cantidad + '"></td>\n\
                          <td align="center"><input style="border:none;width:120px;text-align:center" readonly="readonly"   type="text" id="nombre' + el.id_detalle + '" name="nombre[]" value="' + el.nombre + '"></td>\n\
                          <td align="center"><input style="border:none;width:120px;text-align:center" readonly="readonly"   type="text" id="precio_u' + el.id_detalle + '" name="precio_u[]" value="' + el.preciounitario + '"></td>\n\
                          <td align="center"><input readonly="readonly"  style="width:50px;border:none;text-align:center" type="text" id="sub_t' + el.id_detalle + '" name="sub_t[]" value="' + el.subtotal + '"></td>\n\
                          <td align="center"><input readonly="readonly"  style="width:15px;border:none;text-align:center" type="text" id="iva' + el.id_detalle + '" name="iva[]" value="' + el.iva + '"></td>\n\
                          <td align="center"><input readonly="readonly" style="width:50px;border:none;text-align:center" type="text" step="0.01" id="total' + el.id_detalle + '" name="total[]" value="' + total + '"></td>\n\
                          <td style="text-align:center"><a style="text-align:center;width:20px;" id="btn-borrar' + el.id_detalle + '" class="btn btn-danger btn-xs" onclick="deleteRow(' + el.id_detalle + ')" ><i class="fa fa-trash-o" ></i></a></td>\n\
                          </tr>';

                    $('#tbl-compra tbody').append(row);

                    $('#row-editar-venta').remove();
                    $("#datos-cliente-editar-venta").removeClass("col-sm-8");
                    $("#datos-cliente-editar-venta").addClass("col-sm-12");

                    // var c = parseInt($('#venta').val()) + 1;
                    // $('#venta').val(c);
                    $('#totalCompra').val(parseFloat($('#totalCompra').val()) + total);
                    listcodigo.push(el.codigo);


                });

                swal({
                    title: "Tener en cuenta",
                    text: "Solo se puede modificar el campo de cantidad.",
                    icon: "success",
                    button: "Cerrar!",
                });


            }
            if (data.code === 600) {
                swal({
                    title: "Aviso!",
                    text: "El codigo ingresado no consiste con los existentes",
                    icon: "info",
                    button: "Cerrar!",
                });
            }
        },
        error: function() {

            swal({
                title: "Error!",
                text: "Algo salio mal, vuelve a intentarlo",
                icon: "error",
                button: "Cerrar!",
            });
        }
    });

}


$('#btn-add-producto-edit').on('click', function() {
    for (i = 0; i < listcodigo.length; i++) {
        if (listcodigo[i] == $('#codigo').val()) {
            swal({
                title: "Error!",
                text: "No se puede agregar el mismo codigo, a una misma Venta!.",
                icon: "error",
                button: "Cerrar!",
            });

            return false;
        }
    }

    addRowEditSale()
})

$('#btn-add-producto-edit-compra').on('click', function() {
        for (i = 0; i < listcodigo.length; i++) {
            if (listcodigo[i] == $('#codigo').val()) {
                swal({
                    title: "Error!",
                    text: "No se puede agregar el mismo codigo, a una misma compra!.",
                    icon: "error",
                    button: "Cerrar!",
                });

                return false;
            }
        }

        addRowEditCompra()
    })
    /*************    Cargar la venta aeditar   ************/
$('#btn-venta-edit').on('click', function() {


    for (i = 0; i < listcodigo.length; i++) {
        if (listcodigo[i] == $('#codigo').val()) {
            swal({
                title: "Error!",
                text: "No se puede agregar el mismo codigo, a una misma Venta!.",
                icon: "error",
                button: "Cerrar!",
            });

            return false;
        }
    }
    swal({
        title: "Aviso!",
        text: "Entraras a modo edicion de venta.",
        icon: "info",
        button: "Cerrar!",
    });
    $("#codigo").removeAttr('disabled');
    $("#btn-add-producto-edit").removeAttr('disabled');
    cargarVenta()

});

/*************    Cargar la venta aeditar   ************/
$('#btn-compra-edit').on('click', function() {


    for (i = 0; i < listcodigo.length; i++) {
        if (listcodigo[i] == $('#codigo').val()) {
            swal({
                title: "Error!",
                text: "No se puede agregar el mismo codigo, a una misma Venta!.",
                icon: "error",
                button: "Cerrar!",
            });

            return false;
        }
    }
    swal({
        title: "Aviso!",
        text: "Entraras a modo edicion de venta.",
        icon: "info",
        button: "Cerrar!",
    });
    $("#codigo").removeAttr('disabled');
    $("#btn-add-producto-edit-compra").removeAttr('disabled');
    cargarCompra()

});
























$('#btn-articulo').on('click', function() {


    if ($('#id-venta').val() == '' || $('#codigo').val() == '') {
        swal({
            title: "Error!",
            text: "Vuelve a intentarlo, recuerda llenar el campo de codigo, no puede estar vacio, vuelve a ingresarlo.",
            icon: "error",
            button: "Cerrar!",
        });

        return false;
    }
    for (i = 0; i < listcodigo.length; i++) {
        if (listcodigo[i] == $('#codigo').val()) {
            swal({
                title: "Error!",
                text: "No se puede agregar el mismo codigo, a una misma Venta!.",
                icon: "error",
                button: "Cerrar!",
            });

            return false;
        }
    }
    swal({
        title: "Aviso!",
        text: "Entraras a modo edicion de venta.",
        icon: "info",
        button: "Cerrar!",
    });

    addRowEditSale();

});