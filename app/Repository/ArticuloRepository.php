<?php

namespace App\Repository;


use App\Articulo;
use App\Proveedor;
use App\Articulo_proveedor;

class ArticuloRepository
{
    public function sql_listar_articulo()
    {
    	
    	$articulos = Articulo::all();

        return $articulos; 
    }

    public function sql_listar_proveedores()
    {
    	
    	$proveedores = Proveedor::pluck('nombreproveedor','id');
        
        return $proveedores; 
    }

    public function create_articulo($data)
    {
    	return Articulo::create($data);
    }


    public function find_articulo($id)
    {
       return Articulo::findOrFail($id);
        
    }

    public function update_article($request,$id)
    {
        $articulo = $this->find_articulo($id);
        $articulo->update($request);

    }

    public function find_producto($codigo)
    {
        $articulo = Articulo::select('id','codigo', 'nombre','precioventa', 'iva')->where('codigo', $codigo)->get();
        
     
    	return  $articulo;
    	     
    }

    public function validate_getArticuloByCodigo($articulo)
    {
    	if(count($articulo)>0){
            $answer=array(
                "datos" => $articulo,
                "code" => 200
            ); 

            	return $answer;
        }else{
            $answer=array(
                "error" => 'No existen datos con ese codigo.',
                "code" => 600
            ); 
               return $answer;
        }
    }

    public function sql_create_articulo_proveedor($request, $articulo_id)
    {    	
            $articulo_proveedor = new Articulo_proveedor; //Crea un nuevo articulo_proveedor
            $articulo_proveedor ->articulo_id=  $articulo_id;
            $articulo_proveedor ->proveedor_id= $request->proveedor;
            $articulo_proveedor ->save();   //Guarda los datos en el nuevo objeto tipo articulo_proveedor
    }
}
