<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CajaRequest;
use App\Caja;
use App\Producto;
use App\Proveedor;
use App\Articulo;
use App\Cliente;
use App\Venta_articulo;
use PDF;
use App\Venta;

class PdfController extends Controller
{
   
    public function __construct()
    {
        // Filtrar todos los métodos
        $this->middleware('auth');

    }
   
   
   
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



        public function articulosPDF()
        
            {
                $articulos1 = Articulo::all();
                
                $pdf3 = PDF::loadView('informe.articulos',['articulos1'=>$articulos1]);
                return $pdf3->stream('articulos.pdf');
        
            }


            public function clientesPDF()
        
            {
                $clientes1 = Cliente::all();
                
                $pdf4 = PDF::loadView('informe.clientes',['clientes1'=>$clientes1]);
                return $pdf4->stream('clientes.pdf');
        
            }
            public function facturaPDF(Venta $venta)
        
            {
                $venta_articulo = Venta_articulo::with('articulo')->where('venta_id', '=', $venta->id)->get();
                // así lo tengo yo, no falta mas , falta lo de la variablepara el largo de la hoja
                $pdf4 = PDF::loadView('informe.factura',['venta_articulo'=>$venta_articulo, 'venta' => $venta]);
                return $pdf4->stream('factura.pdf');
        
            }
}
