<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{ 
    protected $table = 'proveedores';
    protected $fillable=['nit','nombreproveedor','nombrerepresentante','direccion','telefono','email','observacion'];
    
    public static function nitUnico($nit){
        
        $nuips = Proveedor::where('nit', '=', $nit)->count();
        if($nuips == 0){
            return true;
        }else{
            return false;
        }

    }
}
