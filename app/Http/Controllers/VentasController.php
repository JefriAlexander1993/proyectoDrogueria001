<?php

namespace App\Http\Controllers;

use App\Articulos;
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
    public function index()
    {

        // dd($ventas);
        
        // $ventas = DB::table('venta_articulo')
        // ->join('articulos', 'articulos.id', '=', 'venta_articulo.articulo_id')
        // ->select('articulos.nombre', 'articulos.id')
        // ->get();
      
        $ventas_articulos = Venta_articulo::orderBy('id')->paginate('5');;
      
        return  view('venta.index', compact('ventas_articulos'));// SE carga en vista y le pasamos la variable
   
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('venta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        // echo 'hola mundo';
        // exit();
     
        $id = Auth::id();
        $totalVenta=$request->totalVenta;
        $venta = new Venta; 
        $venta->totalventa=$totalVenta;
        $venta->users_id=$id;
        $venta->save();
     
       $idV= DB::table('ventas')->max('id');

     
        for($x = 0; $x < $request->cantidadarticulos; $x++) {
             
        $venta_articulo= new Venta_articulo;
        
        $venta_articulo->cantidad=$request->cantidad[$x];
        $venta_articulo->preciounitario=$request->precio_u[$x];
        $venta_articulo->subtotal=$request->sub_t[$x];
        $venta_articulo->total=$request->total[$x];
        $venta_articulo->venta_id=$idV;
        $venta_articulo->articulo_id=$request->codigo[$x];
   
       $venta_articulo->save();

       // return $venta_articulo;
    }
return redirect()->route('venta.index')
->with('info', 'El venta fue guardado.');

}
    /**
     * Display the specified resource.
     *
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
        $venta = Venta::find($codigo); // Busca un Producto por medio del  id-
        return view('venta.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $venta = Venta::find($codigo); // Busca un Producto por medio del  id-
        
        return view('venta.edit', compact('venta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function update(VentaRequest $request, $codigo)
    {
        $venta = new Venta; 
        $venta->totalventa=$request->totalventa;
       
 
 
        /*$request->Validacion*/
        $venta->save();
        return redirect()->route('venta.index')
        ->with('info', 'El venta fue guardado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function destroy($codigo)
    {
        $venta = Venta::find($codigo);
        $venta->delete();
        return back()->with('info', 'El venta fue eliminado');
    }
}
