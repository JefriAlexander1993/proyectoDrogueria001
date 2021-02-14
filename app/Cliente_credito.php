<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente_credito extends Model
{
    protected $table = 'cliente_credito';
    protected $fillable=['saldo_actual','cuotas_restantes','cantidad','preciounitario','subtotal','total','cliente_id','articulo_id', 
        'credito_id','abono_id'];


    public function clientes()
    {
        return $this->belongsToMany(Cliente::class,'cliente_credito','cliente_id'); 

    }     
     public function creditos()
    {
        return $this->belongsToMany(Credito::class,'cliente_credito','credito_id');

    
    }

}
