<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
     protected $fillable=['nombre','telefono','direccion','correoElectronico','nombreMedicamento','observacion'];

}
