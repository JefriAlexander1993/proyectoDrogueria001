<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $fillable=['codigo','descripcion','marca','rubro','precioVenta','stock'];
}
