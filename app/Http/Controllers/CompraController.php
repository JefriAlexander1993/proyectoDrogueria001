<?php
namespace App\Http\Controllers;

use App\Compra;
use App\Articulo;
use App\Http\Requests\FormRequestCreateCompra;
use App\Http\Requests\FormRequestUpdateCompra;
use App\Repository\CompraRepository;

use Illuminate\Http\Request;

class CompraController extends Controller
{

    protected $query;
    public function __construct(CompraRepository $query)
    {
        // Filtrar todos los métodos
        $this->middleware('auth');
        $this->query = $query;

    }

    public function index() // Funcion que envia al index de compra

    {
        // $articulos = articulo::search($request->codigo)->orderBy('id')->paginate('8');
        return view('compra.index', ['compras' => $this->query->all_purchase()]); // Se carga en vista y le pasamos la variable
    }

    public function create() // Funcion encargada de enviar a la vista create de compra

    {
        return view('compra.create', ['articulos' => $this->query->all_article()]); // Retorna a la vista create de compra
    }

    public function store(FormRequestCreateCompra $request) // Funcion que almacena los datos de compra

    {

        $purchase = $this->query->create_purchase($request);

        $this->query->create_create_purchase_article($request, $purchase->id);

        return redirect()->route('compra.index') // Redirige a la ruta compra.index (compra/index)
            ->with('info', 'La compra fue guardada.'); // El sistema arroja el mensaje "La compra fue guardada"
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id) // Funcion que muestra la informacion de la compra

    {
        $compra = $this->query->find_purchase($id);
        $detalles = $this->query->purchase_article($compra->id);
        $totalcompra = $detalles->sum('total');
        // Se obtienen los detalles de la compra de acuerdo a su id
        return view('compra.show', compact('detalles','totalcompra')); // Retorna a la vista show de compra con las variables compra y detalles
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id) // Funcion que encuentra una compra por medio del id

    {
        // Busca un Articulo por medio del  id

        return view('compra.edit', ['compra' => $this->query->find_purchase($id), 'articulos' => $this->query->all_article()]); // Retorna a la vista edit de compra con la variable compra

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */

    public function getCompraById($id) //Funcion que obtiene un articulo por medio de su codigo

    {
        $compra =$this->query->find_purchase($id);

        return $this->query->get_purchases_find($compra->id);

        // Retorna a la vista edit de compra con la variable compra

    }

    public function find_producto_edit_compra($codigo, $id, Request $request)
    {

        $articulo = Articulo::select('id', 'codigo', 'nombre', 'precioventa', 'iva')->where('codigo', $codigo)->get();

 
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

    public function update(FormRequestUpdateCompra $request, $id) // Funcion que encuentra una compra por medio del id

    {

        $this->query->create_update_purchase_article($request, $id);
        return redirect()->route('compra.index')
            ->with('info', 'La compra fue actualizada exitosamente.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // Funcion encargada de eliminar compras por medio de una id

    {

        $compra = Compra::find($id)->delete(); // Busca una compra por medio de su id         // Elimina la compra encontrada
        return back()->with('error', 'La compra fue eliminada'); // Retorna atras con un mensaje de informacion "La compra fue eliminada"
    }
}
