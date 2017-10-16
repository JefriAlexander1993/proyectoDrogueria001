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
        $ventas = Venta::orderBy('id')->paginate('5');;
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
        $venta->fechaVenta=$request->fechaVenta;
        $venta->nombreventa=$request->usuario;
        $venta->nombreProducto=$request->nombreProducto;
        $venta->cantidad=$request->cantidad;
        $venta->precioUnitario=$request->precioUnitario;
        $venta->iva=$request->iva;
        $venta->valorTotal=$request->valorTotal;
 
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
    public function show($id)
    {
        $venta = Venta::find($id); // Busca un Producto por medio del  id-
        return view('venta.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venta = Venta::find($id); // Busca un Producto por medio del  id-
        
        return view('venta.edit', compact('venta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function update(VentaRequest $request, $id)
    {
    
        $venta = new Venta; 
        $venta->fechaVenta=$request->fechaVenta;
        $venta->nombreventa=$request->usuario;
        $venta->nombreProducto=$request->nombreProducto;
        $venta->cantidad=$request->cantidad;
        $venta->precioUnitario=$request->precioUnitario;
        $venta->iva=$request->iva;
        $venta->valorTotal=$request->valorTotal;
 
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
    public function destroy($id)
    {
        $venta = Venta::find($id);
        $venta->delete();
        return back()->with('info', 'El venta fue eliminado');
    }
}
