<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Cliente;
use App\Departamento;
use App\Municipio;
use App\Venta;
use App\Venta_articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repository\FunctionRepository;


class VentasController extends Controller
{
    protected $query;
    public function __construct(FunctionRepository $query)
    {
        // Filtrar todos los métodos
        $this->middleware('auth');
        $this->query =$query;

    }

    public function index(Request $request) // Funcion que envia al index de venta

    {
        
        $sumVenta = DB::table('ventas')->select('totalventa')->sum('totalventa');
        // Suma el total de las ventas

        $ventas = Venta::orderBy('id', 'desc')->paginate();

        return view('venta.index', compact('ventas', 'sumVenta')); // Se carga en vista y le pasamos la variable

    }

    public function create() // Funcion encargada de enviar a la vista create de venta

    {
        if(count(Articulo::where('cantidad', '>', 0)->pluck('nombre', 'codigo'))>0){

            return view('venta.create', ['articulos' =>Articulo::where('cantidad', '>', 0)->pluck('nombre', 'codigo') , 'clientes' => Cliente::select('nuip', 'primer_nombre', 'id', 'primer_apellido')->get(), 'departamentos' => Departamento::pluck('nombre', 'id'), 'municipios' => Municipio::pluck('nombre', 'id')]); // Retorna al create de venta

        }else{

            
        return redirect()->route('venta.index') // Redirige a la ruta venta.index (venta/index)
        ->with('info', ' Se debe agregar productos antes de hacer ventas.');

        }
    }

    public function store(Request $request) // Funcion que almacena los datos de venta

    {

        $venta = new Venta; // Se crea un nuevo objeto tipo venta
        $venta->totalventa = $request->totalVenta;
        $venta->users_id = Auth::id();
        // Se almacenan los datos
        $venta->save();

        for ($x = 0; $x < $request->cantidadarticulos; $x++) { // Ciclo el cual almacena todos los articulos entrantes en la venta

            $venta_articulo = new Venta_articulo;
            $venta_articulo->cantidad = $request->cantidad[$x];
            $venta_articulo->preciounitario = $request->precio_u[$x];
            $venta_articulo->subtotal = $request->sub_t[$x];
            $venta_articulo->total = $request->total[$x];
            $venta_articulo->venta_id = $venta->id;
            $venta_articulo->cliente_id = $request->clienteid;

            $articulo = Articulo::where('codigo', '=', $request->codigo[$x])->first();
            $articulo->precantidad = $articulo->cantidad;
            $venta_articulo->articulo_id = $articulo->id;
            $articulo->save();

            $articulo1 = Articulo::where('codigo', '=', $articulo->codigo)->first();
            $articulo->cantidad -= $request->cantidad[$x];
            $articulo->save();
            $venta_articulo->save();
        }

        return redirect()->route('venta.index') // Redirige a la ruta venta.index (venta/index)
            ->with('info', 'La venta fue guardada.');
    }

    public function show($id) // Funcion que muestra la informacion de la venta

    {
        $venta = Venta::find($id); // Busca una venta por medio de su id

        $detalles = DB::table('venta_articulo')
            ->join('articulos', 'articulos.id', '=', 'venta_articulo.articulo_id')
            ->select('venta_articulo.*', 'articulos.codigo', 'articulos.nombre')->where('venta_articulo.venta_id', '=', $id)
            ->get();

        // Se obtienen los detalles de la venta_articulo

        return view('venta.show', compact('venta', 'detalles')); // Retorna a la vista show de venta con la variables venta y detalles
    }

    public function edit($id) // Funcion que encuentra una venta por medio del id

    {
        $venta = Venta::find($id);

        // Busca una venta por medio del  id
        $clienteventa = DB::table('venta_articulo')
            ->join('clientes', 'clientes.id', '=', 'venta_articulo.cliente_id')
            ->join('ventas', 'ventas.id', '=', 'venta_articulo.venta_id')
            ->select('clientes.nuip', 'clientes.primer_nombre', 'clientes.primer_apellido', 'clientes.id')
            ->where('venta_articulo.venta_id', '=', $venta->id)
            ->distinct()
            ->first();

        $articulos = Articulo::where('cantidad', '>', 0)->pluck('nombre', 'codigo');

        return view('venta.edit', compact('articulos', 'clienteventa', 'venta')); // Retorna a la vista edit de venta con la variable venta
    }

    public function update($id, Request $request) // Funcion que actualiza los datos de la venta

    {

        $venta = Venta::find($id); // Se crea un objeto de tipo venta

        // Se crea un nuevo objeto tipo venta
        $venta->totalventa = $request->totalVenta;
        $venta->users_id = Auth::id();
        // Se almacenan los datos
        $venta->save();

        // Ciclo el cual almacena todos los articulos entrantes en la venta
        // //        foreach ($venta_articulos as $key => $venta_articulo) {
        for ($x = 0; $x < count($request->id_detalle); $x++) {

            $venta_articulo = Venta_articulo::find($request->id_detalle[$x]);

            if ($venta_articulo) {

                $venta_articulo->cantidad = $request->cantidad[$x];
                $venta_articulo->preciounitario = $request->precio_u[$x];
                $venta_articulo->subtotal = $request->sub_t[$x];
                $venta_articulo->total = $request->total[$x];
                $venta_articulo->venta_id = $venta->id;
                $venta_articulo->cliente_id = $request->cliente_venta;

                $articuloa = Articulo::where('id', '=', $venta_articulo->articulo_id)->first();

                $retaurar = $articuloa->precantidad - $request->cantidad[$x];
                $articuloa->cantidad = $retaurar;
                $venta_articulo->articulo_id = $articuloa->id;
                $articuloa->save();
                $venta_articulo->save();

            } else {

                $venta_articulo = new Venta_articulo;

                $venta_articulo->cantidad = $request->cantidad[$x];
                $venta_articulo->preciounitario = $request->precio_u[$x];
                $venta_articulo->subtotal = $request->sub_t[$x];
                $venta_articulo->total = $request->total[$x];
                $venta_articulo->venta_id = $venta->id;
                $venta_articulo->cliente_id = $request->clienteid;
                $articulo = Articulo::where('codigo', '=', $request->codigo[$x])->first();
                $articulo->precantidad = $articulo->cantidad;
                $venta_articulo->articulo_id = $articulo->id;
                $articulo->cantidad -= $request->cantidad[$x];
                $articulo->save();
                $venta_articulo->save();

            }

            //      }
        }

        return redirect()->route('venta.index') // Redirige a la ruta venta.index (venta/index)
            ->with('info', 'La venta fue actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // Funcion que elimina una venta por medio de un codigo

    {
        $venta = Venta::find($id);
        $venta_articulo = Venta_articulo::where('venta_id', $venta->id)->first();
        $articulo = Articulo::where('id', '=', $venta_articulo->articulo_id)->first();
        $articulo->cantidad = $articulo->precantidad;
        $articulo->save();

        $venta->delete();

        // Busca una venta por medio de su codigo        // Elimina la venta
        return back()->with('error', 'La venta fue eliminada'); // Retorna a la pagina anterior con el mensaje de informacion "La venta fue eliminada"
    }

    public function storeCliente(Request $request) // Funcion que almacena los datos de cliente

    {

        if (Cliente::nuipUnico($request->nuipCliente)) { // Si el nuip es unico entonces se permite proceder a guardar los datos del cliente
            $cliente = Cliente::create($request->all());

            // return response()->json([
            //     'datos' => $cliente,
            //     'code'=>200
            // ]);
            return redirect()->route('venta.create') // Se retorna a la ruta cliente.index (cliente/index)
                ->with('info', 'El cliente a sido guardado con exito.'); // El sistema arroja la infomacion "El cliente a sido guardado con exito"
        } // En caso de no ser un nuip unico

        return response()->json([
            "error" => 'Error en el momento de guardar.',
            "code" => 600,
        ]);

        // return redirect()->route('cliente.create')  // Se redirige a  la ruta cliente.create (cliente/create)
        // ->with('info', 'Ya existe un cliente con el nuip digitado.'); // El sistema arroja la informacion "Ya existe un cliente con el nuip digitado"

    }

    public function getVentaById($id) //Funcion que obtiene un articulo por medio de su codigo

    {
        $venta = Venta::find($id);

        $detalles = DB::table('venta_articulo')
            ->join('articulos', 'articulos.id', '=', 'venta_articulo.articulo_id')
            ->join('ventas', 'ventas.id', '=', 'venta_articulo.venta_id')
            ->select('venta_articulo.id AS id_detalle', 'venta_articulo.cantidad', 'venta_articulo.subtotal', 'venta_articulo.total', 'ventas.id', 'articulos.codigo', 'articulos.nombre', 'articulos.precioventa', 'articulos.iva', 'articulos.preciounitario')
            ->where('venta_articulo.venta_id', '=', $venta->id)
            ->get();

        if (count($detalles) > 0) {

            return response()->json([

                'detalles' => $detalles,
                'code' => 200,

            ]);

        } else {

            return response()->json([
                "error" => 'No existen datos con ese codigo.',
                "code" => 600,

            ]);

        }

        // Retorna a la vista edit de venta con la variable venta

    }
    public function find_producto_edit_venta($codigo, $id, Request $request)
    {

        $articulo = Articulo::select('id', 'codigo', 'nombre', 'precioventa', 'iva')->where('codigo', $codigo)->get();

        $venta = Venta::find($id);
        $detalles = DB::table('venta_articulo')
            ->join('articulos', 'articulos.id', '=', 'venta_articulo.articulo_id')
            ->join('ventas', 'ventas.id', '=', 'venta_articulo.venta_id')
            ->select('venta_articulo.id AS id_detalle', 'venta_articulo.cantidad', 'venta_articulo.subtotal', 'venta_articulo.total', 'ventas.id', 'articulos.codigo', 'articulos.nombre', 'articulos.precioventa', 'articulos.iva', 'articulos.preciounitario')
            ->where('venta_articulo.venta_id', '=', $venta->id)
            ->get();

        if (count($articulo) > 0) {
            $response = array(

                "datos" => $articulo,
                "code" => 200,
            );

            return $response;
        } else {
            $response = array(
                "error" => 'No existen datos con ese codigo.',
                "code" => 600,
            );
            return $response;
        }

    }
    
    public function generate_chart_sale_month($year){
    
        $data = $this->query->data_chart($year);     
      //  echo json_encode($data);
        
        return response()->json($data,200);
    }

}
