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


     public function scopeSearch($query, $codigo){

return $query->where('codigo','LIKE',"%$codigo%");
// return $query->where('type', $type);
    }
}
