<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>FACTURA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" type="text/css" href="../public/css/informe.css"> --}}
</head>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: lavender
}

th {
    background-color:  cornflowerblue;
    color: white;
}

.container {
  position: relative;
  font-size: 14px;
  text-align: justify;
}

.topleft {
  position: absolute;

 
}
.topcenter {
  position: absolute;
  left: 205px ;

}
.toprigth {
  position: relative;
  left: 470px ;
}


</style>
<body>

    <div class="container">
            <h2 class="page-header">
                <div class="logo">
                    <img class="" src="../public/assets/img/logo.png" alt="" data-src="/ic/logo.png" alt="" witdh="50" height="50">
                    <i class="fas fa-globe"></i> Jm programing, Inc.
                  
                </div>

            </h2>
    </div>
    <!-- info row -->

    <h4 align="center">INFORMACIÓN GENERAL</h4>

    <div class="container" >
        <div class="topleft">
            De
            <strong>Jm, Inc.</strong><br>
            <strong>Vendedor:</strong>{{ Auth::user()->name_user }}<br>
            <strong>Dirección:</strong> Calle 5 13-28<br>
            <strong>Pais:</strong> Colombia<br>
            <strong>Ciudad:</strong> Pradera valle<br>
            <strong>Teléfono:</strong> 3156607568<br>
            <strong>Email:</strong> jm@gmail.com

        </div>
        <div class="topcenter">
            <strong>Identifición: </strong>{{ $venta_cliente->nuip}}<br>
            <strong>1° Nombre: </strong>{{ $venta_cliente->primer_nombre}}<br>
            <strong>2° Nombre: </strong>{{ $venta_cliente->segundo_nombre}}<br>
            <strong>1° Apellido: </strong>{{ $venta_cliente->primer_apellido}}<br>
            <strong>2° Apellido: </strong>{{ $venta_cliente->segundo_apellido}}<br>
            {{-- <strong>Direccion: </strong>{{ $direccion->calle}} {{ $direccion->carrera}} {{ $direccion->numero_casa}}<br>
            <strong>Barrio: </strong>  {{ $direccion->barrio}} --}}
        </div>
        <div class="toprigth">
            <strong>Factura n°: </strong>{{ $venta->id }}<br>
            <strong>Fecha</strong> {{ $venta->created_at }}
        </div>
    </div><br><br><br><br>
 
    <h4 align="center">DETALE COMPRA</h4>

            <table class="table">
                <thead>
                    <tr>
                        <th align="center"><strong>Cod</strong></th>
                        <th align="center"><strong>Nombre</strong></th>
                        <th align="center"><strong>Cant</strong></th>
                        <th align="center"><strong>Iva</strong></th>
                        <th align="center"><strong>Precio</strong></th>
                        <th align="center"><strong>Sub total</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($venta_articulos as $venta_articulo)
                    <tr>
                        <td align="center">
                            {{$venta_articulo->codigo}}
                        </td>
                        <td align="center">
                            {{$venta_articulo->nombre}}
                        </td>
                        <td align="center">
                            {{$venta_articulo->cantidad}}
                        </td>
                        <td alig="center">
                            {{$venta_articulo->iva}}
                        </td>
                        <td align="center">
                            {{$venta_articulo->preciounitario}}
                        </td>
                        <td align="center">
                            {{$venta_articulo->total}}
                        </td>
                    </tr>

                    @endforeach

                    {{-- <td colspan="6" style="padding:10px">
                                <strong>TOTAL NETO:&nbsp;</strong>{{$venta}}
                    </td> --}}
                </tbody>
            </table>
            <table class="table">
                <tr>
                  <th>Total:</th>
                  <td> {{$venta_articulo->totalventa}}</td>
                </tr>
            </table>

</body>
<script type="text/javascript">
    window.addEventListener("load", window.print());

</script>
</html>

