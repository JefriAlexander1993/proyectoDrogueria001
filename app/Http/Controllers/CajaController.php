<?php

namespace App\Http\Controllers;

use App\Caja;
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
       $ventas = DB::table('ventas')
        ->join('users', 'users.id', '=', 'ventas.users_id')
        ->select('ventas.totalventa')
        ->get();
        
    //     $arrayventa= Caja::objectToArray($ventas);
              
    //    return $arrayventa;
    //     //   $sumArray  =  array_sum($ventas);
    //     //   echo $sumArray ;
            

    // //  echo  $arrayventa;
    //    exit();
    


        $cajas = Caja::orderBy('id')->paginate('8');
      
        return  view('caja.index', compact('cajas'));// SE carga en vista y le pasamos la variable
       
    
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idA=Auth::id();
        $sumVenta = DB::table('ventas')->select('totalventa')->where('users_id','=',$idA)->sum('totalventa'); 
        return view('caja.create', compact('sumVenta'));
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
        
        $caja->nombreusuario= $request->nombreusuario;
        $caja->valorinicial= $request->valorinicial;
        $caja->valorfinal= $request->valorfinal;
        $idA=Auth::id();
        $sumVenta = DB::table('ventas')->select('totalventa')->where('users_id','=',$idA)->sum('totalventa');
         
        $caja->ganancia= $request->ganancia;

        $caja->save();

        return redirect()->route('caja.index')
        ->with('info', 'La caja fue guardada.');

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
    public function update(Request $request, $id)
    {
        
        $caja =Caja::find($id);/*Buscar en caja*/
        $caja->nombreusuario= $request->nombreusuario;
        $caja->valorinicial= $request->valorinicial;
        $caja->valorfinal= $request->valorfinal;
        $caja->ganancia= $request->ganancia;

     /*$request->Validacion*/
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