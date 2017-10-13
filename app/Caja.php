<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    protected $fillable=['nombreUsuario','valorInicial','valorFinal','ganancia',];
}
