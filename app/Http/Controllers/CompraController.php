<?php

namespace App\Http\Controllers;

use App\Compra;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use App\Http\Controllers\Auth;



class CompraController extends Controller
{
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
      
        $compra = new Compra;/*Crear un instancia*/
        $compra->fechacompra= $request->fechacompra;
        $compra->cantidad= $request->cantidad;
        $compra->valorunitario= $request->valorunitario;
        $compra->iva= $request->iva;
        $compra->valortotal= $request->valortotal;
       

        

     /*$request->Validacion*/
        $compra->save();
       
        return redirect()->route('compra.index')
         ->with('info', 'La compra fue guardado.');
//*Guardado todos los camppos guardados y mira si todos los capos son validos*//

return ;

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
}
