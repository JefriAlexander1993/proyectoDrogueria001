<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class proveedor extends Model
{ 
    protected $table = 'proveedores';
    protected $fillable=['nit','nombreproveedor','nombrerepresentante','direccion','telefono','email','observacion',];
    



     public function scopeSearch2($query, $nit){

   return $query->where('nit','LIKE',"%$nit%");


    }


}
