<?php

namespace App\Http\Controllers;

use App\cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = articulo::orderBy('id')->paginate('8');;
        // return $articulo;
        return  view('cliente.index', compact('articulos'));// SE carga en vista y le pasamos la variable
       
    
}
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(articuloRequest $request)
    {
        dd($request);
        $articulo = new articulo;   /*Crear un instancia*/
        
        $articulo->codigo= $request->codigo;
        $articulo->descripcion= $request->descripcion;
        $articulo->marca= $request->marca;
        $articulo->rubro= $request->rubro;
        $articulo->precioVenta= $request->precioVenta;
        $articulo->stock= $request->stock;
      
        $articulo->save();
        return redirect()->route('articulo.index')
        ->with('info', 'El articulo fue guardado.');

        return ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo = articulo::find($id); // Busca un articulo por medio del  id-
         return view('articulo.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $articulo = articulo::find($id); // Busca un articulo por medio del  id-
        
        return view('articulo.edit', compact('articulo'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function update(articuloRequest $request, $id)
    {
        
        $articulo =articulo::find($id);/*Buscar en articulo*/

        $articulo->codigo= $request->codigo;
        $articulo->descripcion= $request->descripcion;
        $articulo->marca= $request->marca;
        $articulo->rubro= $request->rubro;
        $articulo->precioVenta= $request->precioVenta;
        $articulo->stock= $request->stock;
      
     /*$request->Validacion*/
        $articulo->save();
        return redirect()->route('articulo.index')
        ->with('info', 'E articulo fue actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = articulo::find($id);
        $articulo->delete();
        return back()->with('danger', 'El articulo fue eliminado');
    }
}
