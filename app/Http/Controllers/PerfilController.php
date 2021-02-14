<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exceptions\Handler;
use Illuminate\Support\Facades\Auth;
use App\User;

class PerfilController extends Controller
{
    public function __construct()
    {
        // Filtrar todos los métodos
        $this->middleware('auth');

    }
    

    
    public function show($id)          // Funcion que muestra la informacion del perfil
    {
       // Se obtiene el id del usuario interactuando con el sistem

         $perfil = DB::table('users')
                 ->where('users.id', '=', $id)
                 ->select('id','name_user', 'email', 'password')->first();

        // Se obtienen todos los datos del perfil
      

           return view('perfil.show', compact('perfil'));       // Se retorna a la vista show de perfil
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\perfiles  $perfiles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)          // Funcion que encuentra un cliente
    {   
       // Se obtiene el id del usuario que se encuentra interactuando con el sistema
        $perfil = DB::table('users')
        ->select('id','name_user', 'email', 'password')->where('users.id', '=', $id)
        ->first();
        // Se obtiene toda la informacion de ese usuario


        return view('perfil.edit', compact('perfil'));  // Se retorna a la vista edit de perfil con la variable perfil
    }
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\perfiles  $perfiles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id) // Funcion que actualiza los datos del perfil (usuario)

    {
        $perfil = User::find($id); 
                             // En caso de no ser 

        if (is_null($request->password)) {
               return back()// Redirige a la ruta perfil.show (perfil/show) con la variable del id
            ->with('error', 'El campo de password no se diligencio.');  

             
        }

            $perfil->password=bcrypt($request->password); 
            $perfil->save();

            // Actualiza los datos del perfil (usuario)
            return redirect()->route('inventario.index')        // Redirige a la ruta perfil.show (perfil/show) con la variable del id
            ->with('info', 'Se realizo el cambio de contraseña, exitosamente.');      // El sistema muestra un mensaje de informacion diciendo "El perfil fue guardado"
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\perfiles  $perfiles
     * @return \Illuminate\Http\Response
     */
    
}
