<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Caja;
use App\Venta;

use Compra_articulo;
use DB;
use PDF;
use App\Cliente;
use setasign\Fpdi\Fpdi;


class PdfController extends Controller
{

    public function __construct()
    {
        // Filtrar todos los métodos
        $this->middleware('auth');

    }

    public function cajasPDF() // Funcion que genera el pdf de caja

    {
        $cajas1 = Caja::all();

        $pdf = PDF::loadView('informe.cajas', ['cajas1' => $cajas1]);

        return $pdf->stream('cajas.pdf');

    }
    public function comprasPDF() // Funcion que genera el pdf de caja

    {
        $compra_articulos = Compra_articulo::all();

        $pdf = PDF::loadView('informe.compras', ['$compra_articulos' => $compra_articulos ]);

        return $pdf->stream('cajas.pdf');

    }

    // Funcion que genera el pdf de proveedores
    public function proveedoresPDF()
    {
        $proveedores1 = DB::table('proveedores')
            ->select('proveedores.*')
            ->get();

        $pdf2 = PDF::loadView('informe.proveedoresPdf', ['proveedores1' => $proveedores1]);
        return $pdf2->stream('proveedores.pdf');

    }

    public function articulosPDF() // Funcion que genera el pdf de articulos

    {
        $articulos = DB::table('articulos')->select('codigo','nombre','preciounitario','precioventa','stockmin')->get();


        $pdf3 = PDF::loadView('informe.articulosPdf', compact('articulos'));
        return $pdf3->stream('listado_articulos.pdf');

    }

    public function clientesPDF() // Funcion que genera el pdf de clientes

    {
        $clientes = DB::table('clientes')
            ->join('direcciones', 'direcciones.id', '=',
                'clientes.direccion_id')
            ->join('clientes_telefonos', 'clientes.id', '=',
                'clientes_telefonos.cliente_id')
            ->select('clientes.*', 'direcciones.*', 'clientes_telefonos.numero_telefonico')
            ->get();

        $pdf4 = PDF::loadView('informe.clientesPdf', ['clientes' => $clientes]);
        return $pdf4->stream('clientes.pdf');

    }
    public function facturaPDF($id) // Funcion que genera el pdf de factura
    {
 
        $height = 300;
        $venta = venta::find($id);

        //Total de la venta
        // $venta = Venta::where('id', '=', $venta_articulo->id)->value('totalventa');

        $venta_articulos = DB::table('venta_articulo')
            ->join('articulos', 'articulos.id', '=', 'venta_articulo.articulo_id')
            ->join('ventas', 'ventas.id', '=', 'venta_articulo.venta_id')->where('venta_articulo.venta_id', '=', $id)
            ->select('venta_articulo.cliente_id','ventas.id','ventas.totalventa' ,'venta_articulo.cantidad', 'venta_articulo.preciounitario', 'venta_articulo.subtotal', 'venta_articulo.total', 'articulos.nombre', 'articulos.codigo', 'articulos.iva')
            ->get();
            $venta_cliente = DB::table('venta_articulo')
            ->join('clientes', 'clientes.id', '=', 'venta_articulo.cliente_id')
            ->join('ventas', 'ventas.id', '=', 'venta_articulo.venta_id')->where('venta_articulo.venta_id', '=', $id)
            ->select('clientes.*')
            ->first();
            // $direccion = DB::table('municipio_direcciones')
            // ->join('clientes', 'clientes.id', '=', 'municipio_direcciones.cliente_id')->where('municipio_direcciones.cliente_id', '=', $venta_cliente->id)          
            // ->join('municipios', 'municipios.id', '=', 'municipio_direcciones.municipio_id')               
            // ->join('direcciones', 'direcciones.id', '=', 'municipio_direcciones.direccion_id')
            // ->select('direcciones.*','municipios.nombre' )
            // ->first();



        //     dd($venta_articulos->cliente_id);
        // $cliente = Cliente::find($venta_articulos->cliente_id)->dd();    
        $height += sizeOf($venta_articulos);

        // así lo tengo yo, no falta mas , falta lo de la variablepara el largo de la hoja
        $pdf4 = PDF::loadView('informe.factura', ['venta'=>$venta,'venta_articulos' => $venta_articulos,'venta_cliente'=> $venta_cliente ,'height' => $height]);
        return $pdf4->stream('factura.pdf');

    }
}
