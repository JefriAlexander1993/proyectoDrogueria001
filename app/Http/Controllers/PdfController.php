<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CajaRequest;
use App\Caja;
use App\Producto;
use App\Proveedor;
use PDF;

class PdfController extends Controller
{
    public function cajasPDF()
    
        {
            $cajas1 = Caja::all();
            
            $pdf = PDF::loadView('informe.cajas',['cajas1'=>$cajas1]);
             
            return $pdf->stream('cajas.pdf');
    
        }


         public function productosPDF()
        
             {
                 $productos1 = Producto::all();
                
                 $pdf1 = PDF::loadView('informe.productos',['productos1'=>$productos1]);
                 
                 return $pdf1->stream('productos.pdf');
        
             }
        
        public function proveedoresPDF()
        
            {
                $proveedores1 = Proveedor::all();
                
                $pdf2 = PDF::loadView('informe.proveedores',['proveedores1'=>$proveedores1]);
                return $pdf2->stream('proveedores.pdf');
        
            }
}
