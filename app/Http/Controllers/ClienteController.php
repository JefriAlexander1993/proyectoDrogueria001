<?php

namespace App\Http\Controllers;

use App\cliente;
use App\Articulo;
use App\Detalle_cliente_articulo;
use Illuminate\Http\Request;
// use  App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
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

        $clientes = cliente::orderBy('id')->paginate('8');;
        // return $cliente;
        return  view('cliente.index', compact('clientes'));// SE carga en vista y le pasamos la variable
       

    
}
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $articulos = Articulo::pluck('nombre','id');
        return view('cliente.create', compact('articulos') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
      
        
        // dd($request);
        $cliente = new cliente;   /*Crear un instancia*/
        
        $cliente->nombre= $request->nombre;
        $cliente->telefono= $request->telefono;
        $cliente->direccion= $request->direccion;
        $cliente->correoelectronico= $request->correoelectronico;
        $cliente->observacion= $request->observacion;
        $cliente->save();

        $cliente_id= $cliente->id;
        $art_id = $request->codigo_id;
    

        $articulo_cliente = new Detalle_cliente_articulo;
        $articulo_cliente->cliente_id=$cliente_id ;
        $articulo_cliente->articulo_id=$art_id;

        return redirect()->route('cliente.index')
        ->with('info', 'El cliente a sido guardado con exito.');
     
        return ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = cliente::find($id); // Busca un cliente por medio del  id-
         return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $cliente = cliente::find($id); // Busca un cliente por medio del  id-
        
        return view('cliente.edit', compact('cliente'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $cliente =cliente::find($id);/*Buscar en cliente*/

        $cliente->nombre= $request->nombre;
        $cliente->telefono= $request->telefono;
        $cliente->direccion= $request->direccion;
        $cliente->correoelectronico= $request->correoelectronico;
        // $cliente->nombremedicamento= $request->nombremedicamento;
        $cliente->observacion= $request->observacion;

     /*$request->Validacion*/
        $cliente->save();
        return redirect()->route('cliente.index')
        ->with('info', 'E cliente fue actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = cliente::find($id);
        $cliente->delete();
        return back()->with('danger', 'El cliente fue eliminado');
    }
}
