<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    protected $table = 'cajas';
    protected $fillable=['venta_id','user_id','nombreUsuario','valorInicial','valorFinal','ganancia',];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function venta()
    {
        return $this->belongsTo('App\Venta');
    }

}
