<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
   
     protected $table = 'clientes';

     protected $fillable=['nombre','telefono','direccion','correoelectronico','nombremedicamento','observacion'];



     public function articulo()
     {
         return $this->belongsTo('App\Articulo');
     }
}
