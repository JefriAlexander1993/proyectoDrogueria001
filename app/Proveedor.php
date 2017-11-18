<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{ 
    protected $table = 'proveedores';
    protected $fillable=['nit','nombreproveedor','nombrerepresentante','direccion','telefono','email','observacion'];
    
}
