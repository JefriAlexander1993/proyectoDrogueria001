<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
class Compra extends Model
{


    protected $table = 'compras';
    protected $fillable=['totalCompra'


    ];
      
    public function articulo()
    {
        return $this->belongsTo('App\Articulo');
    }

    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }
}
