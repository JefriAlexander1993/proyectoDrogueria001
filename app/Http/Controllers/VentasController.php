<?php

namespace App\Http\Controllers;

use App\ventas;
use Illuminate\Http\Request;
use App\Venta;
use App\Http\Requests\VentaRequest;
class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::orderBy('codigo')->paginate('5');;
        return  view('venta.index', compact('ventas'));// SE carga en vista y le pasamos la variable
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
    public function store(VentaRequest $request)
    {
        
       
        $venta = new Venta; 
        $venta->fechaActual=$request->fechaActual;
        $venta->numFactura=$request->numFactura;
        $venta->usuario=$request->usuario;
        $venta->codigo=$request->codigo;
        $venta->nombreProducto=$request->nombreProducto;
        $venta->cantidad=$request->cantidad;
        $venta->precioUnitario=$request->precioUnitario;
        $venta->unidades=$request->stock;
        $venta->iva=$request->iva;
        $venta->subTotal=$request->subTotal;
        $venta->total=$request->total;
 
        /*$request->Validacion*/
        $venta->save();
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
        $venta->fechaActual=$request->fechaActual;
        $venta->numFactura=$request->numFactura;
        $venta->usuario=$request->usuario;
        $venta->codigo=$request->codigo;
        $venta->precioUnitario=$request->precioUnitario;
        $venta->nombreProducto=$request->nombreProducto;
        $venta->cantidad=$request->cantidad;
        $venta->unidades=$request->stock;
        $venta->iva=$request->iva;
        $venta->subTotal=$request->subTotal;
        $venta->total=$request->total;
 
 
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
