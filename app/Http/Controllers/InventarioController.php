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

    public function index()     // Funcion encargada de enviar al index de inventario
    {
        return  view('inventario.index', ['detalles'=>Articulo::orderBy('id')->paginate('8')]);             
    }

    
}
