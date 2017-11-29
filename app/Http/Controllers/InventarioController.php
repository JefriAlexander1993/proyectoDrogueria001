<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;
use App\compra_articulo;
use DB;
class InventarioController extends Controller
{
    public function __construct()
    {
        // Filtrar todos los métodos
        $this->middleware('auth');

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()     // Funcion encargada de enviar al index de inventario
    {
        $fechaActual = date("m");
        $fechavencimiento =$fechaActual-2;
        
    $fechacreate= Articulo::select('created_at')->get();
    
    $f=explode("-",$fechacreate);
    $fecha =$f[1];
 
        $detalles=Articulo::orderBy('id')->paginate('8');
        return  view('inventario.index', compact('detalles','fechavencimiento','fecha'));
       
       
    }

    public function create(){

    return view('inventario.create');

    }
    public function edit(){

        return view('inventario.edit');

    }
    public function show(){

        return view('inventario.show');

    }

    
}
