<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
class Compra extends Model
{


    protected $table = 'compras';
    protected $fillable=['nombre','cantidad', 'valorunitario','iva', 'valortotal', 'codigo_id',


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
