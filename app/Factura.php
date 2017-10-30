<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{

   protected $table = 'facturas';
   protected $fillable=[ 'fecha'];


   public function venta()
   {
       return $this->belongsTo('App\Venta');
   }
}
