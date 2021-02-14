@extends('layouts.app3')
@section('content')

<div class="row">
    <div class="col-md-8">
        <strong>Dashboard</strong>
     </div>

    <div class="col-md-4" >
        <strong>Selecciona un año: </strong> 
         <select name="year_sales" style="width:100%" id="year_sales" class="form-control" onChange="load_sales_graph(this.value);" placeholder="Elige un año" title="Elige un año">
           
            <option selected>2020</option>
            @foreach($años as $item)
            <option value="{{$item}}">
                {{$item}}
              
            </option>
            @endforeach
        </select>      
    </div>
    
</div>
<hr>
<div class="row">
    <div class="col-md-4">
   
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
    
          <div class="info-box-content">
            <span class="info-box-text">Total de ventas del año.</span>
            <span class="info-box-number" ><input id="total_venta_año" style="border: none;background-color: #fff;" disabled></span>
          </div>
          <!-- /.info-box-content -->
        </div>
    
    </div> 
    <div class="col-md-4">
   
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>
    
          <div class="info-box-content">
            <span class="info-box-text">Total de ventas del mes actual.</span>
            <span class="info-box-number" ><input id="total_venta_mes" style="border: none;background-color: #fff;" disabled></span>
          </div>
          <!-- /.info-box-content -->
        </div>
    
    </div> 
    <div class="col-md-4">
   
        <div class="info-box mb-3">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>
    
          <div class="info-box-content">
            <span class="info-box-text">Total de ventas del dia de hoy.</span>
            <span class="info-box-number" ><input id="total_venta_dia" style="border: none;background-color: #fff;" disabled></span>
          </div>
          <!-- /.info-box-content -->
        </div>
    
    </div> 


</div>
<hr>
<h3 class="text-center"><input id="venta_año" style="border: none;background-color: #fff;font-weight: bold;" disabled></h3>
<hr>
<div class="row">
            <input id="url_traerventasaño" type="hidden" value="{{url('sales')}}">
            
    <div class="col-md-5 " style="position: relative; height:40vh; width:80vw" id="div_ventasmav">
       
        <canvas id="ventasmav" ></canvas>
    </div>
    <div class="col-md-2">
        
    </div> 
  
    <div class=" col-md-5" style="position: relative; height:40vh; width:80vw" id="div_ventasmah">
        <canvas id="ventasmah" ></canvas></div>
  
    </div>
</div>


@endsection

