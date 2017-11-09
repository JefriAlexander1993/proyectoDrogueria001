<?php

namespace App\Http\Controllers;

use App\Proveedor;
use App\Articulo;
use App\Articulo_proveedor;
use Illuminate\Http\Request;
use App\Http\Requests\ArticuloRequest;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Exceptions\Handler;


class ArticuloController extends Controller
{

      public function __construct()
    {
        $this->middleware('auth');
    }
   


    public function index(Request $request)
    {
        
        $articulos = articulo::search($request->codigo)->orderBy('id')->paginate('8');
        // return $articulo;
        return  view('articulo.index', compact('articulos'));// SE carga en vista y le pasamos la variable
       
    
}
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $proveedores = Proveedor::pluck('nombreproveedor','id');
   
        return view('articulo.create', compact('proveedores'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $articulo = new articulo;   /*Crear un instancia*/
        
        $articulo->codigo= $request->codigo;
        $articulo->fechavencimiento=$request->fechavencimiento;
        $articulo->nombre= $request->nombre;
        $articulo->rubro= $request->rubro;
        $articulo->marca= $request->marca;
        // $articulo->cantidad= $request->cantidad;
        $articulo->preciounitario= $request->preciounitario;
        $articulo->iva=$request->iva;
        $articulo->precioventa= $request->precioventa;
        $articulo->stockmin= $request->stockmin;
        $articulo->save();
       
        $art_id = $articulo->id;
        $prov_id= $request->proveedor;

        //  print_r($art_id);
        //  print_r($prov_id);
        //  exit();
        $pivot = new articulo_proveedor;
        $pivot->articulo_id= $art_id;
        $pivot->proveedor_id= $prov_id;
        $pivot->save();

      
        return redirect()->route('articulo.index', $pivot)
        ->with('info', 'El articulo fue guardado.');

    

        // return ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo = articulo::find($id); // Busca un articulo por medio del  id-
         return view('articulo.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $articulo = articulo::find($id); // Busca un articulo por medio del  id-
        $proveedores = Proveedor::pluck('nombreproveedor','id');
        return view('articulo.edit', compact('articulo','proveedores') );
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $articulo =articulo::find($id);/*Buscar en articulo*/

        $articulo->codigo= $request->codigo;
        $articulo->fechavencimiento=$request->fechavencimiento;
        $articulo->nombre= $request->nombre;
        $articulo->rubro= $request->rubro;
        $articulo->marca= $request->marca;
        // $articulo->cantidad= $request->cantidad;
        $articulo->preciounitario= $request->preciounitario;
        $articulo->iva=$request->iva;
        $articulo->precioventa= $request->precioventa;
        $articulo->stockmin= $request->stockmin;
      
     /*$request->Validacion*/
       $articulo->save();
       $art_id = $articulo->id;
       $prov_id= $request->proveedor;

       //  print_r($art_id);
       //  print_r($prov_id);
       //  exit();
       $pivot = new articulo_proveedor;
       $pivot->articulo_id= $art_id;
       $pivot->proveedor_id= $prov_id;
       $pivot->save();

       
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = articulo::find($id);
        $articulo->delete();
        return back()->with('danger', 'El articulo fue eliminado');
    }


    public function getArticuloByCodigo($codigo)
    {
             
        $articulo=DB::table('articulos')->where('codigo', $codigo)->get(['id','codigo', 'nombre',
             'cantidad', 'precioventa', 'iva']);
        if(count($articulo)>0){
            $answer=array(
                "datos" => $articulo,
                "code" => 200
            ); 
        }else{
        $answer=array(
            "error" => 'No existen datos con ese codigo.',
            "code" => 600
        ); 
    }
         return response()->json($answer);
        
    }    

   
}
