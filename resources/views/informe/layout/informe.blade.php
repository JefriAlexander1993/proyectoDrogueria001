<!DOCTYPE html>
<html class="no-js">
<!--<![endif]-->
<head>
    <title>FACTURA</title>
    <link rel="stylesheet" type="text/css" href="../public/css/informe.css'">
</head>
<body>

    <img class="" src="../public/assets/img/logo.png" alt="" data-src="/ic/logo.png" alt="" witdh="50" height="50">

    <p><strong>Fecha:&nbsp;</strong><?php  $fecha=date("j/n/Y"); echo $fecha;?> </p>
    <p><strong>Vendedor:&nbsp;</strong>{{ Auth::user()->name_user }}</p>
    <p><strong>Dirección:&nbsp;</strong> Calle 26 #7a-42</p>
    <hr>

    <main>
        @yield('informe')
    </main>

</body>
</html>
