<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventarios';
    protected $fillable=['preciodecompra',
    'preciomedio','preciodeventa','cantidad','compras_id','articulos_id'];

    public function articulo()
    {
        return $this->belongsTo('App\Articulo');
    }
    public function compra()
    {
        return $this->belongsTo('App\Compra');
    }
}
