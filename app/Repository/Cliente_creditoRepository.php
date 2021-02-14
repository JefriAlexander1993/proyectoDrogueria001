<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use App\Cliente_credito;

class Cliente_creditoRepository 
{
 	public function create_client_credit($request)
    {  
        $cliente_credito = Cliente_credito::where('cliente_id',$request->cliente_id)->first();
        $cliente_credito->saldo_actual -= $request->valor_abono;
        $cliente_credito->cuotas_restantes -= $request->cuota_numero;
        $cliente_credito->save();
    }
}
