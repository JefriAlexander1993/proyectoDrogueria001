<?php

namespace App\Repository;

use App\Articulo;
use App\Compra;
use App\Compra_articulo;
use Auth;
use Illuminate\Support\Facades\DB;

class CompraRepository
{
    public function all_purchase()
    {
        return Compra::orderBy('id', 'desc')->paginate();

    }

    public function all_article()
    {
        return Articulo::pluck('nombre', 'codigo');

    }

    public function create_purchase($request)
    {
        $purchase = new Compra; // Crea un objeto tipo compra
        $purchase->totalCompra = $request->totalCompra;
        $purchase->users_id = Auth::id();
        $purchase->save(); // guarda los datos entrantes de la nueva compra

        return $purchase;
    }

    public function get_purchases_find($id)
    {
       $detalles = DB::table('compra_articulo')
            ->join('articulos', 'articulos.id', '=', 'compra_articulo.articulo_id')
            ->join('compras', 'compras.id', '=', 'compra_articulo.compra_id')
            ->select('compra_articulo.id AS id_detalle', 'compra_articulo.cantidad', 'compra_articulo.subtotal', 'compra_articulo.total', 'compras.id', 'articulos.codigo', 'articulos.nombre', 'articulos.iva', 'articulos.preciounitario')
            ->where('compra_articulo.compra_id', '=', $id)
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

    }
    public function create_create_purchase_article($request, $id)
    {

        $compra = Compra::find($id); // Se crea un objeto de tipo venta

        // Se crea un nuevo objeto tipo venta
        $compra->totalCompra = $request->totalCompra;
        $compra->users_id = Auth::id();
        // Se almacenan los datos
        $compra->save();

        // Ciclo el cual almacena todos los articulos entrantes en la venta
        // //        foreach ($compra_articulos as $key => $compra_articulo) {
        for ($x = 0; $x <$request->cantidadarticulos; $x++) {


                $compra_articulo = new Compra_articulo;

                $compra_articulo->cantidad = $request->cantidad[$x];
                $compra_articulo->preciounitario = $request->precio_u[$x];
                $compra_articulo->subtotal = $request->sub_t[$x];
                $compra_articulo->total = $request->total[$x];
                $compra_articulo->compra_id = $compra->id;

                $articulo = Articulo::where('codigo', '=', $request->codigo[$x])->first();
                $articulo->cantidad += $request->cantidad[$x];
                $articulo->save();

                $compra_articulo->articulo_id = $articulo->id;
                $compra_articulo->save();

            }

    }
    public function create_update_purchase_article($request, $id)
    {

        $compra = Compra::find($id); // Se crea un objeto de tipo venta

        // Se crea un nuevo objeto tipo venta
        $compra->totalCompra = $request->totalCompra;
        $compra->users_id = Auth::id();
        // Se almacenan los datos
        $compra->save();

        // Ciclo el cual almacena todos los articulos entrantes en la venta
        // //        foreach ($compra_articulos as $key => $compra_articulo) {
        for ($x = 0; $x < count($request->id_detalle); $x++) {

            $compra_articulo = Compra_articulo::find($request->id_detalle[$x]);

            if ($compra_articulo) {

                $compra_articulo->cantidad = $request->cantidad[$x];
                $compra_articulo->preciounitario = $request->precio_u[$x];
                $compra_articulo->subtotal = $request->sub_t[$x];
                $compra_articulo->total = $request->total[$x];
                $compra_articulo->compra_id = $compra->id;

                $articuloa = Articulo::where('id', '=', $compra_articulo->articulo_id)->first();

                $retaurar = $articuloa->precantidad - $request->cantidad[$x];
                $articuloa->cantidad = $retaurar;
                $compra_articulo->articulo_id = $articuloa->id;
                $articuloa->save();
                $compra_articulo->save();

            } else {

                $compra_articulo = new Compra_articulo;

                $compra_articulo->cantidad = $request->cantidad[$x];
                $compra_articulo->preciounitario = $request->precio_u[$x];
                $compra_articulo->subtotal = $request->sub_t[$x];
                $compra_articulo->total = $request->total[$x];
                $compra_articulo->compra_id = $compra->id;

                $articulo = Articulo::where('codigo', '=', $request->codigo[$x])->first();
                $articulo->cantidad += $request->cantidad[$x];
                $articulo->save();

                $compra_articulo->articulo_id = $articulo->id;
                $compra_articulo->save();

            }

            //      }
        }

    }

    public function find_purchase($id)
    {
        return Compra::find($id); // Busca una compra por medio del  id

    }

    public function purchase_article($purchase_id)
    {
        return DB::table('compra_articulo')
            ->join('articulos', 'articulos.id', '=', 'compra_articulo.articulo_id')
            ->select('compra_articulo.*', 'articulos.nombre','articulos.codigo')->where('compra_articulo.compra_id', '=', $purchase_id)
            ->get();
    }

}
