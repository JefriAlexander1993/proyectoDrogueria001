@extends('layouts.apphome')
@section('content')

<div class="row">
<div class="col-sm-8" style="text-align:center"><h2><strong>INVENTARIO.</strong></h2>
</div>
<div class="col-sm-4">
@include('inventario.fragment.aside') 
</div>
</div> 
<div class="col-md-12 table-responsive">
<table class="table table-hover">
    <thead>
        <tr>
        <th  class="text-center">Cod</th>
        <th  class="text-center">Nombre</th>
        <th  class="text-center">Fecha Llegada</th>
        <th  class="text-center">Precio de compra</th>
        <th  class="text-center">Precio medio</th>
        <th  class="text-center">Precio venta</th>
        <th  class="text-center">Cantidad actual</th>
        <th  class="text-center">Stock alerta</th>
        <th  class="text-center">Ganancia</th>
      
        </tr>
        </thead>

       
    <tbody>
       
       <tr>
    
    
       </tr>
      
      
        </tbody>
</table>
<div class="col-md-11" align="center" >
{!!$inventarios->render() !!}
<?php 
echo phpversion('tidy');
?>
</div>
</div>
</div>
</div>
@endsection
