<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Compra_articulo;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use App\Http\Controllers\Auth;



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

        $compra->totalCompra=$totalCompra;
        $compra->users_id=$id;
        $compra->save();


        $idV= DB::table('compras')->max('id');
        
     
        $Compra_articulo= new Compra_articulo;

       

        for($x = 0; $x < $request->cantidadarticulos; $x++) {
             
        $Compra_articulo= new Compra_articulo;
        
        $Compra_articulo->cantidad=$request->cantidad[$x];
        $Compra_articulo->preciounitario=$request->precio_u[$x];
        $Compra_articulo->subtotal=$request->sub_t[$x];
        $Compra_articulo->total=$request->total[$x];
        $Compra_articulo->venta_id=$idV;
        $Compra_articulo->articulo_id=$request->codigo[$x];
   
       $Compra_articulo->save();

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
        
        $compra = Producto::find($id); // Busca un Producto por medio del  id-
         return view('compra.show', compact('compra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $compra = Producto::find($id); // Busca un Producto por medio del  id-
        
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
 
        $compra = Producto::find($codigo);/*Buscar en Product*/
        $compra->codigo=$request->codigo;
        // $compra->fechaLlegada= $request->fechaLlegada;
        $compra->nombre= $request->nombre;
        $compra->rubio= $request->rubio;
        $compra->nombreProveedor= $request->nombreProveedor;
        $compra->precioUnitario= $request->precioUnitario;
        $compra->cantidad= $request->cantidad;
        $compra->totalCompra= $request->totalCompra;
        $compra->iva= $request->iva;
        $compra->precioVenta= $request->precioVenta;
        $compra->fechaVencimiento= $request->fechaVencimiento;
        $compra->stock= $request->stock;
     /*$request->Validacion*/
        $compra->save();
        return redirect()->route('.index')
        ->with('info', 'La compra fue actualizado.');
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

    public function getCompraByCodigo($codigo)
    {
            
        echo 'hola mundo';
        $compra=DB::table('articulos')->where('codigo', $codigo)->get(['id','codigo', 'nombre',
        'cantidad', 'precioventa', 'iva']);

        dd($compra);
        exit();
        if(count($compra)>0){
            $answer=array(
                "datos" => $compra,
                "code" => 200
            ); 
        }else{
        $answer=array(
            "error" => 'No existen datos con ese codigo.',
            "code" => 600
        ); 
    }
         return response()->json($answer);
        
    }
}
