<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class cliente extends Model
{
   
     protected $table = 'clientes';

     protected $fillable=['nuip','nombre','telefono','direccion','correoelectronico','observacion'];




     public function scopeSearch1($query, $nuip){ // Realiza la busqueda en base de datos de acuerdo al nuip

   return $query->where('nuip','LIKE',"%$nuip%");


    }

    public static function nuipUnico($nuip){ //Verifica que el nuip sea unico en la base de datos, en caso de no ser unico devuelve falso (false)
        
        $nuips = Cliente::where('nuip', '=', $nuip)->count();
        if($nuips == 0){
            return true;
        }else{
            return false;
        }

    }

}
