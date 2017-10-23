<?php

namespace App\Http\Controllers;


use App\compra;
use Illuminate\Http\Request;
use App\Http\Requests\CompraRequest;
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
        $compras = compra::orderBy('id')->paginate('8');;
        // return $compras;
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
//*Guardado todos los camppos guardados y mira si todos los capos son validos*//

return ;

}

    /**
     * Display the specified resource.
     *
     * @param  \App\comprass  $comprass
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
        
        $compras = compra::find($codigo); // Busca un compra por medio del  id-
         return view('compra.show', compact('compras'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comprass  $comprass
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        
        $compras = compra::find($codigo); // Busca un compra por medio del  id-
        
        return view('compra.edit', compact('compras'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comprass  $comprass
     * @return \Illuminate\Http\Response
     */
    public function destroy( $codigo)
    {
       
        $compras = compra::find($codigo);
        $compras->delete();
        return back()->with('info', 'El compra fue eliminado');
   
}
}
