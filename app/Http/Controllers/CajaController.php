<?php

namespace App\Http\Controllers;

use App\Caja;
use Illuminate\Http\Request;
use App\Http\Requests\CajaRequest;

class CajaController extends Controller

{
 public function index()
    {
        $cajas = Caja::orderBy('id')->paginate('8');;
        // return $caja;
        return  view('caja.index', compact('cajas'));// SE carga en vista y le pasamos la variable
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('caja.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CajaRequest $request)
    {
        $caja = new Caja;/*Crear un instancia*/
        $caja->nombreUsuario= $request->nombreUsuario;
        $caja->valorInicial= $request->valorInicial;
        $caja->valorFinal= $request->valorFinal;
        $caja->ganancia= $request->ganancia;
       


     /*$request->Validacion*/
        $caja->save();
        return redirect()->route('caja.index')
        ->with('info', 'La caja fue guardada.');
//*Guardado todos los camppos guardados y mira si todos los capos son validos*//

        return ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cajas  $cajas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $caja = Caja::find($id); // Busca un caja por medio del  id-
         return view('caja.show', compact('caja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cajas  $cajas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $caja = Caja::find($id); // Busca un caja por medio del  id-
        
        return view('caja.edit', compact('caja'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cajas  $cajas
     * @return \Illuminate\Http\Response
     */
    public function update(cajaRequest $request, $id)
    {
        
        $caja =Caja::find($id);/*Buscar en caja*/
        $caja->nombreUsuario= $request->nombreUsuario;
        $caja->valorInicial= $request->valorInicial;
        $caja->valorFinal= $request->valorFinal;
        $caja->ganancia= $request->ganancia;

     /*$request->Validacion*/
        $caja->save();
        return redirect()->route('caja.index')
        ->with('info', 'El caja fue actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cajas  $cajas
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $caja = Caja::find($id);
        $caja->delete();
        return back()->with('info', 'El caja fue eliminado');
    }
}