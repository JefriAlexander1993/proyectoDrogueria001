<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
     
      'fechaActual','numFactura','usuario','codigo','nombreProducto','cantidad','precioUnitario','stock','iva','subTotal', 'total'  ];
}
