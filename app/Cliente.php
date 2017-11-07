<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class cliente extends Model
{
   
     protected $table = 'clientes';

     protected $fillable=['nuip','nombre','telefono','direccion','correoelectronico','observacion'];




     public function scopeSearch1($query, $nuip){

   return $query->where('nuip','LIKE',"%$nuip%");


    }

    public static function nuipUnico($nuip){
        
        $nuips = Cliente::where('nuip', '=', $nuip)->count();
        if($nuips == 0){
            return true;
        }else{
            return false;
        }

    }

}
