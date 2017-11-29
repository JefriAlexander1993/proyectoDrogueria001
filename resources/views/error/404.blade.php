@extends('layouts.apphome')
@section('content')
<div class="error-header" ></div>
<div class="container free-bird">
    <div class="row">

<div class="card col-md-10 col-lg-10 col-sm-10 mx-auto float-xs-none white z-depth-5 hoverable py-2 px-2">
<div class="card-block" >
  
<div class="text-center"  class="form-header red darken-3 z-depth-5 hoverable">
        <h1 class="nb-error-title"><i class="fa fa-exclamation-triangle left"></i><strong> Error 404</strong></h1>
    </div>


<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

 <center> <h4 class="nb-error-sub">No podemos encontrar la pagina...</h4></center>

                <br>
  <div class="error-desc">

     <ul class="list-inline text-center text-sm">
     <li class="list-inline-item">
       Lo sentimos, pero la pagina que usted esta buscando no pudo ser encontrada o no existe.
       </li>
       <br>
       <li class="list-inline-item">
       Prueba actualizando la pagina.
       </li>

    
    </ul>
    </div>
 
  </div>

</div>


</div>
</div>
</div>
@endsection
