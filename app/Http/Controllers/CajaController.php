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

 

        
 public function index() // Funcion que envia a la vista index de caja
    {
       $ventas = DB::table('ventas')           
        ->join('users', 'users.id', '=', 'ventas.users_id')
        ->select('ventas.totalventa')
        ->get();


        $cajas = Caja::orderBy('id')->paginate('8');
      
        return  view('caja.index', compact('cajas'));// Se carga en vista y le pasamos la variable
       
    
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // Funcion encargada de enviar a la vista create de caja
    {
        $idA=Auth::id();            // Se obtiene el id del usuario que esta interactuando con el sistema
        $name=Auth::user()->name;   // Se obtiene el nombre del usuario que esta interactuando con el sistema
        $sumVenta = DB::table('ventas')->select('totalventa')->where('users_id','=',$idA)->sum('totalventa'); 
        // Realiza la suma total de las ventas de acuerdo al id del usuario
        return view('caja.create', compact('sumVenta', 'name')); // Retorna a la vista create con las variables sumVenta y name
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // Funcion que almacena los datos de caja
    {
        
        $caja = new Caja;   // Crea un objeto tipo caja
        $idA=Auth::id();    // Obtiene la id del usuario que se encuentra interactuando con el sistema
        $caja->nombreusuario= $request->nombreusuario;
        $caja->valorinicial= $request->valorinicial;
        $caja->save();      // Guarda los datos de caja

        $detalle_caja = new detalle_caja; // Crea un objeto tipo detalle_caja
        $detalle_caja->user_id= $idA;    
        $detalle_caja->caja_id=$caja->id; 
        $detalle_caja->save();            // Guarda los datos de detalle_caja
      
     

        return redirect()->route('caja.index')  // Redirige a la ruta caja.index (caja/index)
        ->with('info', 'La caja fue guardada.');    // El sistema arroja la informacion "La caja fue guardada"

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cajas  $cajas
     * @return \Illuminate\Http\Response
     */
    public function show($id)           // Funcion que muestra la informacion de la caja
    {
        $caja = Caja::find($id); // Busca un caja por medio del  id
         return view('caja.show', compact('caja')); // Retorna a la vista show de caja con los datos de la caja que se busca
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cajas  $cajas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)       // Funcion que encuentra una caja por medio del id al igual que el usuario que este actualmente interactuando con el sistema
    {
       
        $idA=Auth::id();          // Obtiene la id del usuario que se encuentra interactuando con el sistema
        $caja = Caja::find($id); // Busca un caja por medio del  id
  

        $sumVenta = DB::table('ventas')->select('totalventa')->where('users_id','=',$idA)->sum('totalventa');
        // Se obtiene valor del total de las ventas
        $cajainicial=  DB::table('detalle_caja')->where('id' ,'=', $caja->id)->value('valorinicial'); 
        // Se obtiene el valor de la caja inicial
        $ganancia =  $sumVenta - $cajainicial;  // Realiza la resta entre sumVenta y cajaInicial
     
        return view('caja.edit', compact('caja', 'sumVenta')); // Retorna a la vista edit con las variables caja y sumVenta
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cajas  $cajas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)//Funcion que se encarga de actualizar los datos de la caja
    {
        
        $caja =Caja::find($id);         // Busca una caja por medio de su id
       
        
        $detalle_caja=  DB::table('detalle_caja')->where('caja_id' ,'=', $caja->id)->get();
        // Obtiene el detalle de la caja por medio de su id
        
        $detalle_caja->valorfinal= $request->valorfinal;
        $detalle_caja->ganancia= $request->ganancia;

        $caja->save();
        return redirect()->route('caja.index')      // Retorna a la ruta caja.index (caja/index) con un aviso "La caja fue actualizada"
        ->with('info', 'La caja fue actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cajas  $cajas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)    // Funcion que elimina una caja por medio de una id
    {
        $caja = Caja::find($id);    // Encuentra la caja por medio de su id
        $caja->delete();            // Elimina la caja
        return back()->with('danger', 'La caja fue eliminado'); // Retorna atras (index) y arroja el mensaje "La caja fue eliminada"
    }

 
}