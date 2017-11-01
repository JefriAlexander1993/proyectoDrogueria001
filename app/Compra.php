<?php

namespace App;

<<<<<<< HEAD

use Illuminate\Database\Eloquent\Model;
class Compra extends Model
{


    protected $table = 'compras';
    protected $fillable=['nombre','cantidad', 'valorunitario','iva', 'valortotal', 'codigo_id',


    ];
      
    public function articulo()
    {
        return $this->belongsTo('App\Articulo');
    }

    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }
=======
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    
    protected $fillable=['codigo','fechaLlegada','nombre','rubio',
    'nombreProveedor','precioUnitario','cantidad','totalCompra',
    'iva','precioVenta','fechaVencimiento',
    'stock',];
>>>>>>> f1ed23d7815e804265035c3f93658fe94b9ba3e3
}
