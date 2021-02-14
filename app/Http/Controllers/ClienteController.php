<?php

namespace App\Http\Controllers;

use App\Repository\ClienteRepository;
use App\Repository\FunctionRepository;
use App\Http\Requests\FormRequestCreateCliente;
use App\Http\Requests\FormRequestUpdateCliente;
use Illuminate\Http\Request;
// use  App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    
    protected $clientes;
    protected $functiongeneral;



    public function __construct(ClienteRepository $clientes, FunctionRepository $function )
    {
        // Filtrar todos los métodos
        $this->middleware('auth');
        $this->clientes = $clientes;
        $this->functiongeneral = $function;

    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // Funcion que envia al index de cliente
    {
    
        return  view('cliente.index',['clientes'=>$this->clientes->all_cliente()]);// Se carga en vista y le pasamos la variable
       
    }
    
    public function create()        // Funcion encargada de enviar a la vista create de cliente
    {
        return view('cliente.create' ,['departamentos'=> $this->functiongeneral->all_departamentos(),'municipios'=>$this->functiongeneral->all_municipios()]);   
    }


    public function store(FormRequestCreateCliente $request) // Funcion que almacena los datos de cliente
    {          

        $direccion = $this->clientes->create_direccion($request); 
        $cliente = $this->clientes->create_cliente($request, $direccion->id);  
        $municipio_direccion = $this->clientes->create_municipio_direccion($request, $cliente->id);
        $this->clientes->create_departamento_municipio($request, $cliente->id);
        $tipos_telefonos= $this->clientes->create_tipos_telefonos($request,);
        $this->clientes->create_cliente_telefonos($request,$tipos_telefonos->id);
        

        return redirect()->route('cliente.index')       // Se retorna a la ruta cliente.index (cliente/index)
            ->with('info', 'El cliente a sido guardado con exito.'); // El sistema arroja la infomacion "El cliente a sido guardado con exito"
     
        
   }
    
        
    public function show($id)       // Funcion que muestra la informacion del cliente
    {
        // Busca un cliente por medio del id
         return view('cliente.show', ['cliente'=>$this->clientes->find_cliente($id)]);  // Retorna a la vista show de clientes con la variable cliente
    }

    public function edit( $id)       // Funcion que encuentra un cliente por medio del id
    {   
    
        return view('cliente.edit',['cliente'=>$this->clientes->find_cliente($id) ,'departamentos'=>$this->functiongeneral->all_departamentos(),'municipios'=>$this->functiongeneral->all_municipios()]);
       
  
    }

    public function update( $id, FormRequestUpdateCliente $request)  // Funcion que actualiza los datos del cliente
    {
        
        $cliente = $this->clientes->update_cliente($request->all(), $id);   // Busca un cliente por medio de su id
         // Guarda los datos actualizados del cliente
        return redirect()->route('cliente.index')           // Redirige a la ruta cliente.index (index del cliente)
        ->with('info', 'El cliente fue actualizado.'); // El sistema arroja un mensaje "El cliente fue actualizado"
    }

    public function destroy($id)  // Funcion que elimina un cliente por medio de una id
    {
        $cliente =  $this->clientes->delete_client($id);   // Busca un cliente por medio de su id
           // Elimina al cliente
        return back()->with('error', 'El cliente fue eliminado.'); //Retorna a la pagina anterior con el mensaje "El cliente fue eliminado"
    }

    public function getClientByNuip($nuip) //Funcion que obtiene un articulo por medio de su codigo
    {
        $cliente = $this->clientes->find_cliente_nuip($nuip);
       
        $this->clientes->validate_getClienteByNuip($cliente);

            return response()->json(['error'=>'No existen datos con ese codigo.',"code" => 600]);
        
    } 


}
