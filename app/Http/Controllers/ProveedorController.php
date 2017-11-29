<?php

namespace App\Http\Controllers;

use App\Proveedor;
use App\Articulo;
use App\Articulo_proveedor;
use Illuminate\Http\Request;
use App\Http\Requests\ProveedorRequest;

class ProveedorController extends Controller
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
    public function index(Request $request)     // Funcion que dirige al index de proveedor
    {
        
        $proveedors = Proveedor::orderBy('id')->paginate('8');
        return  view('proveedor.index', compact('proveedors'));// Se carga en vista y le pasamos la variable
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()            // Funcion encargada de enviar a la vista create de proveedor
    {
         $articulos = Articulo::pluck('nombre','id');

        return view('proveedor.create' , compact('articulos'));     // Retorna la vista create de proveedor
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // Funcion que almacena los datos de proveedor
    {
        
        if(Proveedor::nitUnico($request->nit) &&  Proveedor::nombreUnico($request->nombreproveedor)){     // Condicional si el proveedor posee un nit unico
       
       $proveedor = new Proveedor; 
       $proveedor->nit=$request->nit;
       $proveedor->nombreproveedor=$request->nombreproveedor;
       $proveedor->nombrerepresentante=$request->nombrerepresentante;
       $proveedor->direccion=$request->direccion;
       $proveedor->telefono=$request->telefono;
       $proveedor->email=$request->email;
       $proveedor->observacion=$request->observacion;

       $proveedor->save();          // Se almacena la informacion

       return redirect()->route('proveedor.index')      // Redirige a la ruta proveedor.index (proveedor/index)
       ->with('info', 'El proveedor fue guardado.');    // El sistema muestra un mensaje de informacion "El proveedor fue guardado"

        }
        else{   // En caso de no ser un nit unico

            return redirect()->route('proveedor.create')    // Redirige ala ruta  proveedor.index (proveedor/
            ->with('info', 'Ya existe un proveedor registrado con este nit o con este nombre.'); // El sistema muestra un mensaje de informacion "Ya existe un proveedor registrado con este nit."
        }
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show($id)       // Funcion que muestra la informacion del proveedor
    {
        $proveedor = Proveedor::find($id); // Busca un proveedor por medio del  id
        return view('proveedor.show', compact('proveedor'));    // Retorna a la vista show de proveedor con la variable proveedor
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)       // Funcion que encuentra un proveedor por medio del id
    {
        $proveedor = Proveedor::find($id); // Busca un proveedor por medio del  id
      
        return view('proveedor.edit', compact('proveedor'));    // Retorna a la vista edir de proveedor con la variable proveedor
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)  // Funcion que actualiza los datos del proveedor
    {

        $proveedor =Proveedor::find($id);       // Busca un proveedor por medio de la id

        $proveedor->nit=$request->nit;
        
        $proveedor->nombreproveedor=$request->nombreproveedor;
        $proveedor->nombrerepresentante=$request->nombrerepresentante;
        $proveedor->direccion=$request->direccion;
        $proveedor->telefono=$request->telefono;
        $proveedor->email=$request->email;
        $proveedor->observacion=$request->observacion;

 
        $proveedor->save();         // Almacena la informacion a actualizar
        return redirect()->route('proveedor.index') // Redirige a la ruta proveedor.index (proveedor/index)
        ->with('info', 'El proveedor fue actualizado.');    // El sistema muestra un mensaje de informacion "El proveedor fue actualizado"
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)  // Funcion que elimina un proveedor por medio de una id
    {
        $proveedor = Proveedor::find($id);      // Busca al proveedor por medio de su id
        $proveedor->delete();                   // Elimina al proveedor
        return back()->with('danger', 'El proveedor fue eliminado');    // Retorna a la pagina anterior con el mensaje de informacion "El proveedor fue eliminado"
    }
}
