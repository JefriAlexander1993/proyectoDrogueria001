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
       
        $detalles=Articulo::orderBy('id')->paginate('8');
        return  view('inventario.index', compact('detalles'));      // Retorna a la vista index del inventario
    }

  
}
