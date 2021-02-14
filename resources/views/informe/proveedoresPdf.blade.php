<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->

<html class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>INFORME DE PROVEEDORES</title>
    <div class="container">
        <h2 class="page-header">
            <div class="logo">
                <img class="" src="../public/assets/img/logo.png" alt="" data-src="/ic/logo.png" alt="" witdh="50" height="50">
                <i class="fas fa-globe"></i> Jm programing, Inc.
              
            </div>

        </h2>
</div>

    <meta name="description" content="">
    <style type="text/css">
        table {

            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            align: center;

        }

        td,
        th {

            border: 1px solid black;

        }

    </style>
</head>
<body>
    <h3 align="center" stye="width:80%"><strong>INFORME DE PROVEEDORES.</strong></h3>
    <div class="container" style="text-align:center">
        <table class="table table-hover">
            <thead>
                <tr>

                    <th align="center">Nit</th>
                    <th align="center">Proveedor</th>
                    <th align="center">Representante</th>
                    <th align="center">Email</th>
                    <th align="center">Observación</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores1 as $key => $proveedor)
                <tr>

                    <td align="center">{{$proveedor->nit}}</td>
                    <td align="center">{{$proveedor->nombreproveedor}}</td>
                    <td align="center">{{$proveedor->nombrerepresentante}}</td>
                    <td align="center">{{$proveedor->email}}</td>
                    <td class="text-justify">{{$proveedor->observacion}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>
