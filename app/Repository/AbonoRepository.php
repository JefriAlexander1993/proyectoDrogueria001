<?php

namespace App\Repository;

use App\Cliente;
use App\Cliente_abono;
use App\Abono;



class AbonoRepository 
{
    public function sql_client_manure()
    {
    	 return Cliente_abono::orderBy('id','desc')->paginate();
    }
   
    public function sql_clients()
    {
    	return Cliente::select('nuip','primer_nombre','id','primer_apellido')->get();
    }

    public function create_manure($request)
    {   
        
        $abono = new Abono;
        $abono->fecha_abono = $request->fecha_abono;
        $abono->valor_abono = $request->valor_abono;
        $abono->cuota_numero = $request->cuota_numero;
        $abono->save();
        
        return $abono;
    
    }

    public function delete_manure($id)
    {
      $cliente_abono = Cliente_abono::findOrFail($id)->delete();
      return $cliente_abono;
    }
}
