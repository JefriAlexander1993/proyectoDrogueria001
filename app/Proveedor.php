<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class proveedor extends Model
{ 
    protected $table = 'proveedores';
<<<<<<< HEAD
    protected $fillable=['nit','nombreproveedor','nombrerepresentante','direccion','telefono','email','observacion',];
=======
    protected $fillable=['nit','nombreproveedor','nombrerepresentante','direccion','telefono','email','observacion'];
>>>>>>> 8e08f62a08297092afabec748fd9309a0438f950
    



     public function scopeSearch2($query, $nit){

   return $query->where('nit','LIKE',"%$nit%");


    }


}
