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
    public function index()
    {
        $proveedors = Proveedor::orderBy('id')->paginate('5');;
        return  view('proveedor.index', compact('proveedors'));// SE carga en vista y le pasamos la variable
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articulos = Articulo::pluck('nombre','id');

        return view('proveedor.create' , compact('articulos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedorRequest $request)
    {
        // dd($request);
       $proveedor = new Proveedor; 
       $proveedor->nit=$request->nit;
       $proveedor->nombreProveedor=$request->nombreProveedor;
       $proveedor->nombreRepresentante=$request->nombreRepresentante;
       $proveedor->direccion=$request->direccion;
       $proveedor->telefono=$request->telefono;
       $proveedor->email=$request->email;
       $proveedor->observacion=$request->observacion;
       /*$request->Validacion*/
       $proveedor->save();

       $art_id = $request->articulo;
       $prov_id =$request->id;

       $pivot = new articulo_proveedor;
       $pivot->id_articulo= $art_id;
       $pivot->id_proveedor= $prov_id;
       $pivot->save();

       return redirect()->route('proveedor.index', $pivot)
       ->with('info', 'El proveedor fue guardado.');
//*Guardado todos los camppos guardados y mira si todos los capos son validos*//

       return ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor = Proveedor::find($id); // Busca un Producto por medio del  id-
        return view('proveedor.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = Proveedor::find($id); // Busca un Producto por medio del  id-
      
        return view('proveedor.edit', compact('proveedor'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(ProveedorRequest $request,$id)
    {
        $proveedor = new Proveedor; 
        $proveedor->nit=$request->nit;
        $proveedor->nombreProveedor=$request->nombreProveedor;
        $proveedor->nombreRepresentante=$request->nombreRepresentante;
        $proveedor->direccion=$request->direccion;
        $proveedor->telefono=$request->telefono;
        $proveedor->email=$request->email;
        $proveedor->observacion=$request->observacion;

 
        /*$request->Validacion*/
        $proveedor->save();
        return redirect()->route('proveedor.index')
        ->with('info', 'El proveedor fue actualizado.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->delete();
        return back()->with('info', 'El proveedor fue eliminado');
    }
}
