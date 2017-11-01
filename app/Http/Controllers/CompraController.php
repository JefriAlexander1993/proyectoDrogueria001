<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
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
=======

use App\compra;
use Illuminate\Http\Request;
use App\Http\Requests\CompraRequest;
use App\Http\Controllers\Auth;

class CompraController extends Controller
{
     /**
>>>>>>> f1ed23d7815e804265035c3f93658fe94b9ba3e3
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 
    public function index()
    {
<<<<<<< HEAD
        $compras = Compra::orderBy('id')->paginate('8');;
        // return $productos;
=======
        $compras = compra::orderBy('id')->paginate('8');;
        // return $compras;
>>>>>>> f1ed23d7815e804265035c3f93658fe94b9ba3e3
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
<<<<<<< HEAD
    public function store(Request $request)
    {
      
        $compra = new Compra;/*Crear un instancia*/
        $compra->fechacompra= $request->fechacompra;
        $compra->cantidad= $request->cantidad;
        $compra->valorunitario= $request->valorunitario;
        $compra->iva= $request->iva;
        $compra->valortotal= $request->valortotal;
     /*$request->Validacion*/
        $compra->save();
       
        $compra_id = $compra->id;
        $art_id= $request->articulo_sel;

        $Compra_articulo= new Compra_articulo;        
        $Compra_articulo->compra_id=$compra_id;
        $Compra_articulo->articulo_id= $art_id;
        $Compra_articulo->save();

        return redirect()->route('compra.index')
         ->with('info', 'La compra fue guardado.');
=======
    public function store(compraRequest $request)
    {
      
        $compras = new compra;/*Crear un instancia*/
        $compras->codigo=$request->codigo;
        $compras->fechaLlegada= $request->fechaLlegada;
        $compras->nombre= $request->nombre;
        $compras->rubio= $request->rubio;
        $compras->nombreProveedor= $request->nombreProveedor;
        $compras->precioUnitario= $request->precioUnitario;
        $compras->cantidad= $request->cantidad;
        $compras->totalCompra= $request->totalCompra;
        $compras->iva= $request->iva;
        $compras->precioVenta= $request->precioVenta;
        $compras->fechaVencimiento= $request->fechaVencimiento;
        $compras->stock= $request->stock;

     /*$request->Validacion*/
        $compras->save();
       
        return redirect()->route('compra.index')
         ->with('info', 'El compra fue guardado.');
>>>>>>> f1ed23d7815e804265035c3f93658fe94b9ba3e3
//*Guardado todos los camppos guardados y mira si todos los capos son validos*//

return ;

}

    /**
     * Display the specified resource.
     *
<<<<<<< HEAD
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $compra = Producto::find($id); // Busca un Producto por medio del  id-
         return view('compra.show', compact('compra'));
=======
     * @param  \App\comprass  $comprass
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
        
        $compras = compra::find($codigo); // Busca un compra por medio del  id-
         return view('compra.show', compact('compras'));
>>>>>>> f1ed23d7815e804265035c3f93658fe94b9ba3e3
    }

    /**
     * Show the form for editing the specified resource.
     *
<<<<<<< HEAD
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $compra = Producto::find($id); // Busca un Producto por medio del  id-
        
        return view('compra.edit', compact('compra'));
=======
     * @param  \App\comprass  $comprass
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        
        $compras = compra::find($codigo); // Busca un compra por medio del  id-
        
        return view('compra.edit', compact('compras'));
>>>>>>> f1ed23d7815e804265035c3f93658fe94b9ba3e3
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
<<<<<<< HEAD
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
 
        $compra = Producto::find($codigo);/*Buscar en Product*/
        $compra->codigo=$request->codigo;
        $compra->fechaLlegada= $request->fechaLlegada;
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
=======
     * @param  \App\comprass  $comprass
     * @return \Illuminate\Http\Response
     */
    public function update(compraRequest $request, $codigo)
    {
 
        $compras = compra::find($codigo);/*Buscar en compras*/
        $compras->codigo=$request->codigo;
        $compras->fechaLlegada= $request->fechaLlegada;
        $compras->nombre= $request->nombre;
        $compras->rubio= $request->rubio;
        $compras->nombreProveedor= $request->nombreProveedor;
        $compras->precioUnitario= $request->precioUnitario;
        $compras->cantidad= $request->cantidad;
        $compras->totalCompra= $request->totalCompra;
        $compras->iva= $request->iva;
        $compras->precioVenta= $request->precioVenta;
        $compras->fechaVencimiento= $request->fechaVencimiento;
        $compras->stock= $request->stock;
     /*$request->Validacion*/
        $compras->save();
        return redirect()->route('compra.index')
        ->with('info', 'El compra fue actualizado.');
>>>>>>> f1ed23d7815e804265035c3f93658fe94b9ba3e3
    }

    /**
     * Remove the specified resource from storage.
     *
<<<<<<< HEAD
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
       
        $compra = Compra::find($id);
        $compra->delete();
        return back()->with('info', 'La compra fue eliminado');
    }
=======
     * @param  \App\comprass  $comprass
     * @return \Illuminate\Http\Response
     */
    public function destroy( $codigo)
    {
       
        $compras = compra::find($codigo);
        $compras->delete();
        return back()->with('info', 'El compra fue eliminado');
   
}
>>>>>>> f1ed23d7815e804265035c3f93658fe94b9ba3e3
}
