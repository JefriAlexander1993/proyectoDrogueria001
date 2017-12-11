<!doctype html>
<html lang="{{ app()->getLocale() }}">



    <head>


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Sistema de control J & D</title>



        <!-- <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

       </head>
    <body background="/ic/logo.png">


 
 <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/inventario') }}"><strong>SISTEMA DE CONTROL J & D</strong></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active">
            <div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <li class="active"> <a href="{{ url('/inventario') }}">PAGINA PRINCIPAL<span class="sr-only">(current)</span></a> </li>                
                    @else
                    <li class="active">  <a href="{{ route('login') }}" >LOGIN<span class="sr-only">(current)</span></a> </li>
                    <li class="active">  <a href="{{ url('/register') }}">REGISTRO<span class="sr-only">(current)</span></a></li> 
               
                    @endauth
                </div>
            @endif

          </div>
          </div>
             </li>
          </ul>
        </div>

       </div>
    </nav> 

<br>
<br>
<br>
<blockquote>
<font face="arial" color="green"><h1>Mision</h1></font>
<font face="arial"><p>Droguería el Triunfo es una empresa de régimen simplificado, </br>
que tiene como objetivo suministrar y ofrecer soluciones para las </br>
necesidades de nuestros clientes. Contribuyendo a la calidad de</br>
vida de las personas; entregando servicios de salud y de bienestar </br>
en ambientes de amabilidad y respecto, satisfaciendo los </br>
requerimientos de nuestra clientela y proveedores mediante la </br>
comercialización de medicamentos populares, garantizando la</br>
calidad, eficacia y competitividad.</p></font>
</blockquote>

<blockquote>
<font face="arial" color="green"><h1>Vision</h1></font>
<font face="arial"><p>La Droguería el Triunfo será una organización de continuo crecimiento para la
satisfacción de nuestros clientes; logrando así un reconcomiendo por el buen servicio, a
nivel municipal por trabajar con responsabilidad hacia nuestra comunidad, colaboradores,
clientes y proveedores, siendo innovadora, efectiva, competitiva, líder en sector.</p>
</font>
</blockquote>

          <!-- <script src="{{ asset('assets/jquery/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

    {{-- dataTables --}}
    <script src="{{ asset('assets/dataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/js/dataTables.bootstrap.min.js') }}"></script>

    {{-- Validator --}}
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <script src="{{ asset('assets/bootstrap/js/ie10-viewport-bug-workaround.js') }}"></script>
   -->
    </body>
</html>
