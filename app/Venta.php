<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
        'fechaVenta','usuario','nombreProducto', 'cantidad','precioUnitario','iva','valorTotal',
    
    ];
}
