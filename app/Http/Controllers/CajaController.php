<?php

namespace App\Http\Controllers;

use App\Caja;
use App\Detalle_caja;
use Illuminate\Http\Request;
use App\Http\Requests\CajaRequest;
use PDF;
use DB;
use Illuminate\Support\Facades\Auth;

class CajaController extends Controller

{


    public function __construct()
    {
        // Filtrar todos los métodos
        $this->middleware('auth');

    }

 

        
 public function index()

    {
        
        $cajas = Caja::orderBy('id')->paginate('8');
     
        $idA=Auth::id();
        $detalles = DB::table('detalle_caja')
        ->join('cajas', 'detalle_caja.caja_id', '=', 'cajas.id')
        ->join('users', 'detalle_caja.user_id', '=', 'users.id')
        ->select('cajas.id','cajas.nombreusuario','cajas.valorinicial','detalle_caja.valorfinal','detalle_caja.ganancia')
        ->get();


      
        return  view('caja.index', compact('cajas','detalles'));// SE carga en vista y le pasamos la variable
       
    
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idA=Auth::id();
        $name=Auth::user()->name;
        $sumVenta = DB::table('ventas')->select('totalventa')->where('users_id','=',$idA)->sum('totalventa'); 
        return view('caja.create', compact('sumVenta', 'name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $caja = new Caja;   /*Crear un instancia*/
        $idA=Auth::id();
        $caja->nombreusuario= $request->nombreusuario;
        $caja->valorinicial= $request->valorinicial;
        $caja->save();

        $detalle_caja = new detalle_caja;
        $detalle_caja->user_id= $idA;
        $detalle_caja->caja_id=$caja->id; 
        $detalle_caja->save();
  
     
        return redirect()->route('caja.index')
        ->with('info', 'La caja fue guardada.');

    
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
       
        $idA=Auth::id();
        $caja = Caja::find($id); // Busca un caja por medio del  id-
  

        $sumVenta = DB::table('ventas')->select('totalventa')->where('users_id','=',$idA)->sum('totalventa');
     
        $cajainicial=  DB::table('cajas')->where('id' ,'=', $caja->id)->value('valorinicial'); 

        $ganancia =  $sumVenta - $cajainicial;

         
        return view('caja.edit', compact('caja', 'sumVenta','ganancia'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cajas  $cajas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $caja =Caja::find($id);/*Buscar en caja*/
            
         $detalle_caja= detalle_caja::where('caja_id','=',$caja->id)->first();   
        $detalle_caja->valorfinal= $request->valorfinal;
        $detalle_caja->ganancia= $request->ganancia;
 
        $detalle_caja->save();
        $caja->save();


        return redirect()->route('caja.index')
        ->with('info', 'La caja fue actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cajas  $cajas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $caja = Caja::find($id);
        $caja->delete();
        return back()->with('danger', 'La caja fue eliminado');
    }

 
}