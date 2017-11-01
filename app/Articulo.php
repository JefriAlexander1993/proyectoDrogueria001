<?php

namespace App;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulos';
   

    protected $fillable=['id','codigo','fechavencimiento','nombre', 'rubro','marca','preciounitario','iva','precioventa', 'stockmin'];


    public function proveedor()
    {
        return $this->belongsToMany('App\Proveedor');
    }
    public function compra()
    {
        return $this->belongsToMany('App\Compra');
    }
    public function venta()
    {
        return $this->belongsToMany('App\Venta');
    }
    public function factura()
    {
        return $this->belongsToMany('App\Factura');
    }
    public function inventario()
    {
        return $this->belongsToMany('App\Inventario');
    }

    public function scopeSearch($query, $codigo){

return $query->where('codigo','LIKE',"%$codigo%");
// return $query->where('type', $type);
    }
   

}