<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usersController extends Controller
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
    public function index(Request $request)
    {
     
        // return $user;
        return  view('user.index', compact('users'));// SE carga en vista y le pasamos la variable
       

    
}
    

    public function show($id)
    {
        $user = user::find($id); // Busca un user por medio del  id-
         return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $user = user::find($id); // Busca un user por medio del  id-
        
        return view('user.edit', compact('user'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $user =user::find($id);/*Buscar en user*/

        $user->nuip= $request->nuip;
        $user->nombre= $request->nombre;
        $user->telefono= $request->telefono;
        $user->direccion= $request->direccion;
        $user->correoelectronico= $request->correoelectronico;
        $user->observacion= $request->observacion;

     /*$request->Validacion*/
        $user->save();
        return redirect()->route('user.index')
        ->with('info', 'El user fue actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        return back()->with('danger', 'El user fue eliminado.');
    }


   
}
