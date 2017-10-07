<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable=['fechaLlegada','nombre','precioCompra','cantidad','iva','precioVenta','fechaVencimiento', 'nombreProveedor','stock',];
    
    
   
}
