<?php

namespace App\Repository;
use DB;
use App\Credito;
use App\Cliente_credito;
use App\Articulo; 
use App\Cliente; 
use App\Abono;
use App\Cliente_abono;  


class CreditoRepository 
{
    public function all_credit()
    {
    	return DB::table('cliente_credito')
		            ->join('clientes', 'cliente_credito.cliente_id', '=', 
		                   'clientes.id')
		            ->join('creditos', 'cliente_credito.credito_id', '=', 'creditos.id')
		            ->select('cliente_credito.saldo_actual', 'creditos.*','clientes.nuip')
		            ->orderBy('id','DESC')
		            ->get();

	}
	

	public function create_credit($request)
	{	
		$creditos = new Credito;
		$creditos->total_credito  = $request->total_credito;
		$creditos->forma_de_pago  = $request->forma_de_pago;
		$creditos->cantidad_de_cuotas = $request->cantidad_de_cuotas;
		$creditos->valor_de_cuota = $request->valor_de_cuota;
		$creditos->observacion = $request->observacion;
		$creditos->save();

		return $creditos;
		
	}		

	public function create_client_credit($request)
	{
		$credit = $this->create_credit($request);
		for($x = 0; $x < $request->cantidadarticulos; $x++) { // Ciclo el cual almacena todos los articulos entrantes en la venta
             
			$cliente_credito = new Cliente_credito;
				   
			$cliente_credito->cuotas_restantes = $request->cantidad_de_cuotas;
			$cliente_credito->cantidad = $request->cantidad[$x];
			$cliente_credito->preciounitario = $request->precio_u[$x];
			$cliente_credito->subtotal = $request->sub_t[$x];
			$cliente_credito->total = $request->total[$x];
			$cliente_credito->credito_id =$credit->id;
	  
			$articulo =Articulo::where('codigo','=',$request->codigo[$x])->first() ;
			$articulo->precantidad = $articulo->cantidad;
			$articulo->cantidad -= $request->cantidad[$x];
			$articulo->save();  

			$cliente_credito->cliente_id = $request->clienteid;
			$cliente_credito->saldo_actual = round($request->total_credito);
			$cliente_credito->articulo_id = $articulo->id;
		   			
	
			$cliente_credito->save();
		}
	}

	public function find_credit($id)
	{
		return Credito::findOrFail($id);
	}

	public function select_client()
	{
		return Cliente::get()->except(['correoelectronico']);
	}

	public function select_credit_client($credit_id)
	{
		return
        DB::table('cliente_credito')
            ->select('saldo_actual', 'cuotas_restantes')
            ->where('cliente_credito.credito_id', '=', $credit_id)
            ->get();
	}

	public function find_credit_client($id)
	{
		return Cliente_credito::where('creditos_cliente.credito_id', '=', $id)->first();
	}

	public function update_credit($request)
	{
		$credito_cliente = $this->find_credit_client($id);
		$credito_cliente->fecha_abono = $request->fecha_abono;
        $credito_cliente->valor_abono = $request->valor_abono;
        $credito_cliente->saldo_actual = $request->saldo_actual;
        $credito_cliente->cliente_id = $request->cliente_id;
        $credito_cliente->credito_id = $id;
        $credito_cliente->observacion = $request->observacion;
        $credito_cliente->cuotas_atrasadas = $request->cuotas_atrasadas;
	   
		if ($request->observacion === 'Abono') {
            $op = $credito_cliente->cuotas_credito - 1;
            $credito_cliente->cuotas_restantes = $op;
        }

        $credito_cliente->save();

        $abono = new Abono;
        $abono->fecha_abono = $request->fecha_abono;
        $abono->valor_abono = $request->valor_abono;
        $abono->cuotas_atrasadas = $request->cuotas_atrasadas;

        $abono->save();

        $cliente_abono = new Cliente_abono;
        $cliente_abono->saldo_total = $credito_cliente->saldo_total;
        $cliente_abono->saldo_actual = $request->saldo_actual;
        $cliente_abono->abono_id = $abono->id;
        $cliente_abono->cliente_id = $request->cliente_id;
        $cliente_abono->observacion = $request->observacion;
        $cliente_abono->fecha_nuevoCobro = $request->fecha_nuevoCobro;
        $cliente_abono->save();
	}
}
