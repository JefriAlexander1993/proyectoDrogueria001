<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;
use App\Venta;
use App\Venta_articulo;
use App\Http\Requests\VentaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class VentasController extends Controller
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
    public function index(Request $request)     // Funcion que envia al index de venta
    {

        
        
        $sumVenta = DB::table('ventas')->select('totalventa')->sum('totalventa');
        // Suma el total de las ventas
        
      
        $ventas = Venta::search($request->id)->orderBy('id')->paginate('8');
        

        return  view('venta.index', compact('ventas', 'sumVenta'));// Se carga en vista y le pasamos la variable
   
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()        // Funcion encargada de enviar a la vista create de venta
    {
       
        return view('venta.create');    // Retorna al create de venta
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // Funcion que almacena los datos de venta
    {   
        $id = Auth::id();           // Obtiene el id del usuario que se encuentra interactuando con el sistema
        $totalVenta=$request->totalVenta;
        $venta = new Venta;         // Se crea un nuevo objeto tipo venta
        $venta->totalventa=$totalVenta;
        $venta->users_id=$id;
        $venta->save();             // Se almacenan los datos
     
       $idV= DB::table('ventas')->max('id');

        for($x = 0; $x < $request->cantidadarticulos; $x++) { // Ciclo el cual almacena todos los articulos entrantes en la venta
             
        $venta_articulo= new Venta_articulo;     

        

        $venta_articulo->cantidad=$request->cantidad[$x];
        $venta_articulo->preciounitario=$request->precio_u[$x];
        $venta_articulo->subtotal=$request->sub_t[$x];
        $venta_articulo->total=$request->total[$x];
        $venta_articulo->venta_id= $venta->id;
       
        $articulo =Articulo::where('codigo','=',$request->codigo[$x])->first() ;
        $articulo->cantidad -= $request->cantidad[$x];
        $venta_articulo->articulo_id=$articulo->id;
        $articulo->save();  


      
       $venta_articulo->save();

       }
return redirect()->route('venta.index')     // Redirige a la ruta venta.index (venta/index)
->with('info', 'La venta fue guardada.');   // El sistema muestra un mensaje de  informacion "La venta fue guardada"

}
    /**
     * Display the specified resource.
     *
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function show($id)       // Funcion que muestra la informacion de la venta
    {
        $venta = Venta::find($id);  // Busca una venta por medio de su id
      

        $detalles = DB::table('venta_articulo')
        ->join('articulos','articulos.id','=', 'venta_articulo.articulo_id')
        ->select('venta_articulo.*','articulos.nombre')->where('venta_articulo.venta_id', '=', $venta->id)
        ->get();
        
        // Se obtienen los detalles de la venta_articulo
    
        return view('venta.show', compact('venta', 'detalles'));    // Retorna a la vista show de venta con la variables venta y detalles
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)       // Funcion que encuentra una venta por medio del id
    {
        $venta = Venta::find($id); // Busca una venta por medio del  id
        
        return view('venta.edit', compact('venta'));    // Retorna a la vista edit de venta con la variable venta
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function update(VentaRequest $request, $codigo)  // Funcion que actualiza los datos de la venta
    {
        $venta = new Venta;             // Se crea un objeto de tipo venta
        $venta->totalventa=$request->totalventa;
       
        $venta->save();                 // Se almacena la informacion
        return redirect()->route('venta.index')     // Redirige a la ruta venta.index (venta/index)
        ->with('info', 'La venta fue guardada.');   // El sistema muestra un mensaje de informacion "La venta fue guardada"
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function destroy($codigo)  // Funcion que elimina una venta por medio de un codigo
    {
        $venta = Venta::find($codigo);      // Busca una venta por medio de su codigo
        $venta->delete();                   // Elimina la venta
        return back()->with('danger', 'La venta fue eliminada'); // Retorna a la pagina anterior con el mensaje de informacion "La venta fue eliminada"
    }
}
