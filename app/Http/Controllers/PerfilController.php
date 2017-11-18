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
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

   	  return  view('perfil.index');
    }

    
    public function show()
    {
        $id = Auth::id();

         $perfil = DB::table('users')
        ->select('id','name', 'email', 'password', 'pais', 'ciudad', 'fechaNacimiento', 'estudios', 'informacionPersonal')->where('users.id', '=', $id)
        ->first();
        
      

           return view('perfil.show', compact('perfil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\perfiles  $perfiles
     * @return \Illuminate\Http\Response
     */
    public function edit()

    {
        $id = Auth::id();
        $perfil = DB::table('users')
        ->select('id','name', 'email', 'password', 'pais', 'ciudad', 'fechaNacimiento', 'estudios', 'informacionPersonal')->where('users.id', '=', $id)
        ->first();
        
        return view('perfil.edit', compact('perfil'));
    }
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\perfiles  $perfiles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)

    {

        $id = Auth::id();
        $perfil = User::find($id);
      
        // $perfil->id=$id;
        $perfil->name=$request->name;
        $perfil->email=$request->email;
        $perfil->pais=$request->pais;
        $perfil->ciudad=$request->ciudad;
        $perfil->fechaNacimiento=$request->fechaNacimiento;
        $perfil->estudios=$request->estudios;
        $perfil->password=bcrypt($request->password);
        $perfil->informacionPersonal=$request->informacionPersonal;
       

 
 
        $perfil->save();
        return redirect()->route('perfil.show', $id)
        ->with('info', 'El perfil fue guardado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\perfiles  $perfiles
     * @return \Illuminate\Http\Response
     */
    
}
