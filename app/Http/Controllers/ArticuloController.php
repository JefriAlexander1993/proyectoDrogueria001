<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Repository\ArticuloRepository;
use App\Http\Requests\FormRequestCreateArticulo;
use App\Http\Requests\FormRequestUpdateArticulo;

class ArticuloController extends Controller
{
    protected $articulos;


    public function __construct(ArticuloRepository $articulos){
       
        $this->middleware('auth');
        $this->articulos =  $articulos;
    }

    public function index(){

       return  view('articulo.index', ['articulos'=>  $this->articulos->sql_listar_articulo()]);
    }

    public function create(){
 
        if(count($this->articulos->sql_listar_proveedores())>0){

            return view('articulo.create',['proveedores'=> $this->articulos->sql_listar_proveedores()]); //Retorna a la vista create con la variable proveedores  

        }else{

            return redirect()->route('articulo.index')  //Redirige a la vista index de articulo
                ->with('error', 'El primero debes crear un proveedor.');

        }
    }       

    public function store(FormRequestCreateArticulo $request){   
            
        $articulo = $this->articulos->create_articulo($request->all());   
           
        $this->articulos->sql_create_articulo_proveedor($request , $articulo->id);

        return redirect()->route('articulo.index')  //Redirige a la vista index de articulo
                ->with('info', 'El articulo fue guardado exitosamente.');
    }

    public function show($id){
        // Busca un articulo por medio del  id
        return view('articulo.show', ['articulo'=>$this->articulos->find_articulo($id)]); //Rerotna la vista show de articulo
    }

    public function edit($id){
        return view('articulo.edit',['articulo'=>$this->articulos->find_articulo($id),'proveedores'=>$this->articulos->sql_listar_proveedores()]); //Retorna a la vista edit de articulo y envia los datos del articulo y los proveedores
    }

    public function update(FormRequestUpdateArticulo $request, $id){
        
        $articulo = $this->articulos->update_article($request->all(),$id);
            
        return redirect()->route('articulo.show', ['articulo' => $articulo]);
    }

    public function destroy( $id){
         
        $articulo =  $this->articulos->find_articulo($id)->delete();  // Busca un articulo por medio de su id    // Elimina al articulo encontrado
         return back()->with('error', 'El articulo fue eliminado'); //Rerotna a la pagina anterior la cual seria el index de articulo con un mensaje diciendo "El articulo fue eliminado"
    }

    public function getArticuloByCodigo($codigo) //Funcion que obtiene un articulo por medio de su codigo
    {
        $articulo= $this->articulos->find_producto($codigo);

        $answer =  $this->articulos->validate_getArticuloByCodigo($articulo);

        return response()->json($answer);
        
    }  
}
