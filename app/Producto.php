<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
class Producto extends Model
{

    protected $fillable=['codigo','fechaLlegada','nombre','rubio',
    'nombreProveedor','precioUnitario','cantidad','totalCompra',
    'iva','precioVenta','fechaVencimiento',
    'stock',];
      
   
}
