<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';


    protected $fillable = ['totalventa'];
   

      public function user()
      {
          return $this->belongsTo('App\User');
      }
    }
