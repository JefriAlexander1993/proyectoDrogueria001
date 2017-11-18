

@extends('layouts.app')

   @section('content')

<!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Error 403. Acción no autoriza/peligro </title>
    </head>
    <body>
  
<div class="alert alert-danger" role="alert">
    <strong><h4 class="alert-heading text-center">Error 403, Acceso denegado o prohibido.</h4></strong>
    <p class="mb-0 text-center">Su solicitud fue denegada, si deseas tener acceso cierre sesión y loguedese con rol de administrador</p>
   <div class="text-center">
   <a class="btn btn-labeled btn-default" href="{{url('/home')}}"><i  class="fa fa-home" aria-hidden="true"></i></a>
   </div>
</div>

        
    </body>

    </html>
    @endsection