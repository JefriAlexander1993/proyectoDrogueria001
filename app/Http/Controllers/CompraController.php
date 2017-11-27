<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Compra_articulo;
use App\Articulo;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CompraController extends Controller
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
 
        // $articulos = articulo::search($request->codigo)->orderBy('id')->paginate('8');
        $compras = Compra::orderBy('id')->paginate('8');;

        // return $productos;
        
        return  view('compra.index', compact('compras'));// SE carga en vista y le pasamos la variable
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compra.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      

        $id = Auth::id();
        $totalCompra=$request->totalCompra;

        $compra = new Compra;

        $compra->totalcompra=$totalCompra;
        $compra->users_id=$id;
        $compra->save();
        $idC=$compra->id;


        for($x = 0; $x < $request->cantidadarticulos; $x++) {
             
        $compra_articulo= new Compra_articulo;
        
        $compra_articulo->cantidad=$request->cantidad[$x];
        $compra_articulo->preciounitario=$request->precio_u[$x];
        $compra_articulo->subtotal=$request->sub_t[$x];
        $compra_articulo->total=$request->total[$x];
        $compra_articulo->compra_id=$idC;
        $compra_articulo->articulo_id=$request->codigo[$x];
         
        $articulo =Articulo::where('codigo','=',$request->codigo[$x])->first();
        $articulo->cantidad += $request->cantidad[$x];

        $articulo->save();


        $compra_articulo->save();
       

       
        // DB::table('compra_articulo')
        // ->where('id', $compra_articulo->id)
        // ->update(['cantotal' => $canA]);

     

       }
        return redirect()->route('compra.index')
         ->with('info', 'La compra fue guardada.');


}

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $compra = Articulo::find($id); // Busca un Articulo por medio del  id-


        $detalles = DB::table('compra_articulo')
        ->join('articulos','articulos.id','=', 'compra_articulo.articulo_id')
        ->select('compra_articulo.*','articulos.nombre')->where('compra_articulo.compra_id', '=', $compra->id)
        ->get();



         return view('compra.show', compact('compra', 'detalles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $compra = Articulo::find($id); // Busca un Articulo por medio del  id-
        

        return view('compra.edit', compact('compra'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
 
        $compra = new Venta; 
        $compra->totalcompra=$request->totalcompra;
       
 
 
        $compra->save();
        return redirect()->route('compra.index')
        ->with('info', 'La compra fue guardado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
       
        $compra = Compra::find($id);
        $compra->delete();
        return back()->with('info', 'La compra fue eliminado');
    }

    // public function getCompraByCodigo($codigo)
    // {
            
    //     echo 'hola mundo';
    //     $compra=DB::table('articulos')->where('codigo', $codigo)->get(['id','codigo', 'nombre',
    //     'cantidad', 'precioventa', 'iva']);

    //     dd($compra);
    //     exit();
    //     if(count($compra)>0){
    //         $answer=array(
    //             "datos" => $compra,
    //             "code" => 200
    //         ); 
    //     }else{
    //     $answer=array(
    //         "error" => 'No existen datos con ese codigo.',
    //         "code" => 600
    //     ); 
    // }
    //      return response()->json($answer);
        
    // }
}
