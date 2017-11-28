<?php

namespace App\Http\Controllers;

use App\Cliente;
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
    public function index(Request $request)     // Funcion que envia al index de cliente
    {
        $clientes = Cliente::search1($request->nuip)->orderBy('id')->paginate('8');
        
        return  view('cliente.index', compact('clientes'));// Se carga en vista y le pasamos la variable
       

    
}
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()        // Funcion encargada de enviar a la vista create de cliente
    {

        return view('cliente.create');  //Retorna a la vista create de cliente
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // Funcion que almacena los datos de cliente
    {      
      
        if(Cliente::nuipUnico($request->nuip)){  // Si el nuip es unico entonces se permite proceder a guardar los datos del cliente
            $cliente = new Cliente; 
            $cliente->nuip= $request->nuip;
            $cliente->nombre= $request->nombre;
            $cliente->telefono= $request->telefono;
            $cliente->direccion= $request->direccion;
            $cliente->correoelectronico= $request->correoelectronico;
            $cliente->observacion= $request->observacion;
            $cliente->save();
    
            return redirect()->route('cliente.index')       // Se retorna a la ruta cliente.index (cliente/index)
            ->with('info', 'El cliente a sido guardado con exito.'); // El sistema arroja la infomacion "El cliente a sido guardado con exito"
        }    else{  // En caso de no ser un nuip unico


            return redirect()->route('cliente.create')  // Se redirige a  la ruta cliente.create (cliente/create)
            ->with('info', 'Ya existe un cliente con el nuip digitado.'); // El sistema arroja la informacion "Ya existe un cliente con el nuip digitado"

        }
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show($id)       // Funcion que muestra la informacion del cliente
    {
        $cliente = Cliente::find($id); // Busca un cliente por medio del id
         return view('cliente.show', compact('cliente'));  // Retorna a la vista show de clientes con la variable cliente
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)       // Funcion que encuentra un cliente por medio del id
    {
    
        $cliente = Cliente::find($id); // Busca un cliente por medio del  id
        
        return view('cliente.edit', compact('cliente'));    // Envia a la vista edit de cliente con la variable cliente
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)  // Funcion que actualiza los datos del cliente
    {
        
        $cliente =Cliente::find($id);   // Busca un cliente por medio de su id

        $cliente->nuip= $request->nuip;
        $cliente->nombre= $request->nombre;
        $cliente->telefono= $request->telefono;
        $cliente->direccion= $request->direccion;
        $cliente->correoelectronico= $request->correoelectronico;
        $cliente->observacion= $request->observacion;

        $cliente->save();               // Guarda los datos actualizados del cliente
        return redirect()->route('cliente.index')           // Redirige a la ruta cliente.index (index del cliente)
        ->with('info', 'El cliente fue actualizado.'); // El sistema arroja un mensaje "El cliente fue actualizado"
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)  // Funcion que elimina un cliente por medio de una id
    {
        $cliente = Cliente::find($id); // Busca un cliente por medio de su id
        $cliente->delete();            // Elimina al cliente
        return back()->with('danger', 'El cliente fue eliminado.'); //Retorna a la pagina anterior con el mensaje "El cliente fue eliminado"
    }



}
