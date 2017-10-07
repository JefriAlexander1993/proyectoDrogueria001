<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{ 
    protected $fillable=['nit','nombreProveedor','nombreRepresentante','dirección','telefono','email','observación',];
    
}
