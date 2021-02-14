<?php

namespace App\Repository;

use App\Cliente_abono;
use DB;

class Cliente_abonoRepository
{
    public function create_client_manure($request, $manure_id)
    {
        $cliente_abono = new Cliente_abono;
        $cliente_abono->saldo_actual = $request->saldo_actual;
        $cliente_abono->cuotas_restantes = $request->cuotas_restantes;
        $cliente_abono->cliente_id = $request->cliente_id;
        $cliente_abono->abono_id = $manure_id;
        $cliente_abono->save();

        return $cliente_abono;
    }
    public function get_client_manure_credit($id)
    {
        
        return DB::table('cliente_abonos')
            ->join('abonos', 'abonos.id', '=', 'cliente_abonos.abono_id')
            ->join('clientes', 'clientes.id', '=', 'cliente_abonos.cliente_id')
            ->select('cliente_abonos.saldo_actual','cliente_abonos.cuotas_restantes','clientes.primer_nombre','clientes.segundo_nombre','clientes.primer_apellido','clientes.segundo_apellido','clientes.nuip','abonos.id','abonos.valor_abono','abonos.cuota_numero')->where('cliente_abonos.abono_id', '=', $id)
            ->first();

    }

}
