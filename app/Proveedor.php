<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{ 
    protected $table = 'proveedores';
    protected $fillable=['nit','nombreProveedor','nombreRepresentante','direccion','telefono','email','observacion',];
    
}
