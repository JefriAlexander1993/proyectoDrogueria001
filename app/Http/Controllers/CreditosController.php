<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Cliente_abono;
use App\Cliente_credito;
use App\Credito;
use App\Http\Requests\FormRequestCreateCredito;
use App\Repository\CreditoRepository;
use App\Repository\FunctionRepository;
use Illuminate\Http\Request;

class CreditosController extends Controller
{

    protected $query;
    protected $function;

    public function __construct(CreditoRepository $query, FunctionRepository $function)
    {

        // Filtrar todos los métodos
        $this->middleware('auth');
        $this->query = $query;
        $this->function = $function;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('credito.index', ['creditos' => $this->query->all_credit()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (count($this->function->all_article_select()) > 0) {

            return view('credito.create', ['articulos' => $this->function->all_article_select(), 'clientes' => $this->function->all_client_select(), 'departamentos' => $this->function->all_departamentos(), 'municipios' => $this->function->all_municipios()]); // Retorna al create de venta
        }else{

            return redirect()->route('credito.index') // Redirige a la ruta venta.index (venta/index)
            ->with('info', 'Para crear creditos primero, debe crear articulos.');

        }
    }

    public function store(FormRequestCreateCredito $request)
    {
      
        $this->query->create_client_credit($request);

        return redirect()->route('credito.index') // Redirige a la ruta venta.index (venta/index)
            ->with('info', 'El credito fue creado exitosamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('credito.show', ['credito' => $this->query->find_credit($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $credito = $this->query->find_credit($id);


        $clientes = $this->query->select_client();
        $credito_cliente = $this->query->select_credit_client($credito->id);
        $articulos = $this->function->all_article_select();

        return view('credito.edit', compact('articulos','credito', 'clientes', 'credito_cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return 'Pendiente';
        $this->query->update_credit($request, $id);

        return redirect()->route('credito.index') //Redirige a la vista index de articulo
            ->with('info', 'El abono fue guardado exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Credito::findOrFail($id)->delete(); // Busca un articulo por medio de su id    // Elimina al articulo encontrado
        return back()->with('error', 'El credito fue eliminado'); //Rerotna a la pagina anterior la cual seria el index de articulo con un mensaje diciendo "El articulo fue eliminado"
    }

    public function getCreditByNuip($id) //Funcion que obtiene un credito  por medio de su nuip

    {

        $creditos = Cliente::find($id)->creditos()->get();

        $size = sizeof($creditos);

        if ($size == 0) {

            return response()->json(["code" => 500]);
        } else {

            for ($i = 0; $i < $size; $i++) {

                $credito_cliente = Cliente_credito::
                    where('cliente_id', $id)
                    ->where('credito_id', $creditos[$i]->id)
                    ->where('saldo_actual', '>', 0)
                    ->select('cuotas_restantes', 'saldo_actual')->get();
                for ($i = 0; $i < sizeof($credito_cliente); $i++) {

                    $sa = $credito_cliente[$i]->saldo_actual;
                    $cr = $credito_cliente[$i]->cuotas_restantes;

                }

            }

            $arr = array('saldo_actual' => $sa, 'cuotas_restantes' => $cr);
            $abono_cliente = Cliente_abono::where('cliente_id', $id)->get();

            return response()->json(
                ['datoscredito' => $creditos,
                    'datosaabono_cliente' => $abono_cliente,
                    'datoscredito_cliente' => $arr,
                    'code' => 200]);
        }

    }
}
