<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    
    protected $fillable=['codigo','fechaLlegada','nombre','rubio',
    'nombreProveedor','precioUnitario','cantidad','totalCompra',
    'iva','precioVenta','fechaVencimiento',
    'stock',];
}
