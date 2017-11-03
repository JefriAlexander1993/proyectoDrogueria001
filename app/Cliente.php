<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
   
     protected $table = 'clientes';

     protected $fillable=['nuip','nombre','telefono','direccion','correoelectronico','observacion'];



     public function articulo()
     {
         return $this->belongsTo('App\Articulo');
     }
}
