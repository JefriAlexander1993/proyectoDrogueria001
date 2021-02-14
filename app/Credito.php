<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    protected $table = 'creditos';
    protected $fillable=['id','total_credito','modo_de_pago','valor_de_cuota','forma_de_pago','cantidad_de_cuotas','observacion'];

    public function clientes()
    {
        return $this->belongsToMany(Cliente::class)->withTimestamps();
        

    } 

}
