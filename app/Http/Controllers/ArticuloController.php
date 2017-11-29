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
use Illuminate\Support\Facades\Auth;

class ArticuloController extends Controller
{

      public function __construct()
    {
        $this->middleware('auth');
    }
   


    public function index(Request $request) //Funcion que retorna a la vista index del articulo
    {
        $articulos = articulo::search($request->codigo)->orderBy('id')->paginate('8');
        return  view('articulo.index', compact('articulos'));// Se carga en vista y le pasamos la variable articulos
       
    
}
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //Funcion que rerotna a la vista create del articulo
    {
       
        $proveedores = Proveedor::pluck('nombreproveedor','id'); //Obtiene el nombre de los proveedores y su id
   
        return view('articulo.create', compact('proveedores')); //Retorna a la vista create con la variable proveedores
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //Funcion que se encarga de almacenar todos los datos del articulo
    {
        if(Articulo::codigoUnico($request->codigo)){ 
        $articulo = new articulo;   //Crea un nuevo articulo
        
        $articulo->codigo= $request->codigo;
        $articulo->fechavencimiento=$request->fechavencimiento;
        $articulo->nombre= $request->nombre;
        $articulo->rubro= $request->rubro;
        $articulo->marca= $request->marca;
        $articulo->preciounitario= $request->preciounitario;
        $articulo->iva=$request->iva;
        $articulo->precioventa= $request->precioventa;
        $articulo->stockmin= $request->stockmin;
        $articulo->save();            //Guarda los datos provenientes del request en el objeto articulo creado
       
        $art_id = $articulo->id;
        $prov_id= $request->proveedor;

        $pivot = new articulo_proveedor;    //Crea un nuevo articulo_proveedor
        $pivot->articulo_id= $art_id;
        $pivot->proveedor_id= $prov_id;
        $pivot->save();                     //Guarda los datos en el nuevo objeto tipo articulo_proveedor

      
        return redirect()->route('articulo.index', $pivot)  //Redirige a la vista index de articulo
        ->with('info', 'El articulo fue guardado.');

        }else{

            return redirect()->route('articulo.create')  // Se redirige a  la ruta cliente.create (cliente/create)
            ->with('info', 'Ya existe un articulo con el codigo digitado.'); // El sistema arroja la informacion "Ya existe un cliente con el nuip digitado"

        }


        }
    /**
     * Display the specified resource.
     *
     * @param  \App\articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function show($id) //Funcion que encuentra un articulo de acuerdo a su id, y la envia a la vista show de articulo
    {
        $articulo = articulo::find($id); // Busca un articulo por medio del  id
         return view('articulo.show', compact('articulo')); //Rerotna la vista show de articulo
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //Funcion que encuentra el articulo de acuerdo a su id, al igual que un proveedor por medio del nombre e id, se envian a la vista edit de articulo
    {
        
        $articulo = articulo::find($id); // Busca un articulo por medio del  id
        $proveedores = Proveedor::pluck('nombreproveedor','id'); //Busca los proveedores retornando su nombre y sus ids
        return view('articulo.edit', compact('articulo','proveedores') ); //Retorna a la vista edit de articulo y envia los datos del articulo y los proveedores
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //Funcion que se encarga de actualizar los datos del articulo
    {
        
        $articulo =articulo::find($id);     // Busca un articulo por medio de su id

        $articulo->codigo= $request->codigo;
        $articulo->fechavencimiento=$request->fechavencimiento;
        $articulo->nombre= $request->nombre;
        $articulo->rubro= $request->rubro;
        $articulo->marca= $request->marca;
        $articulo->preciounitario= $request->preciounitario;
        $articulo->iva=$request->iva;
        $articulo->precioventa= $request->precioventa;
        $articulo->stockmin= $request->stockmin;
      
        $articulo->save();                  // Guarda los nuevos datos del articulo
        $art_id = $articulo->id;
        $prov_id= $request->proveedor;

        $pivot = new articulo_proveedor;    // Crea un nuevo objeto tipo articulo_proveedor
        $pivot->articulo_id= $art_id;
        $pivot->proveedor_id= $prov_id;
        $pivot->save();                     // Guarda los datos del articulo_proveedor
        return redirect()->route('articulo.index', $pivot) //Retorna a la ruta de index de articulo (vista articulo/index) con la variable pivot la cual se refiere al articulo_proveedor
        ->with('info', 'El articulo fue actualizado.');

       
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // Funcion que elimina un articulo por medio de una id
    {
        $articulo = articulo::find($id);  // Busca un articulo por medio de su id
        $articulo->delete();              // Elimina al articulo encontrado
        return back()->with('danger', 'El articulo fue eliminado'); //Rerotna a la pagina anterior la cual seria el index de articulo con un mensaje diciendo "El articulo fue eliminado"
    }


    public function getArticuloByCodigo($codigo) //Funcion que obtiene un articulo por medio de su codigo
    {
             
        $articulo=DB::table('articulos')->where('codigo', $codigo)->get(['id','codigo', 'nombre',
             'precioventa', 'iva']);
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
