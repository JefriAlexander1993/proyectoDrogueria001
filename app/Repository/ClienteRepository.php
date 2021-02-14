<?php

namespace App\Repository;


use App\Cliente;
use App\Direccion;
use App\Municipio_direccion;
use App\Departamento_municipio;
use App\Tipos_telefono;
use App\Cliente_telefonos;


class ClienteRepository 
{
    public function all_cliente()
    {
	    return Cliente::orderBy('id','desc')->paginate();
    }

    public function find_cliente($id)
    {	
    	
    	return Cliente::findOrFail($id); 

    }

    public function delete_client($id)
    {
        return $this->find_cliente($id)->delete();
    }


    public function find_cliente_nuip($nuip)
    {	
    	
    	return Cliente::findOrFail($nuip); 

    }

    public function validate_getClienteByNuip($cliente)
    {

     	if(count($cliente)>0){
            $answer=array(
                "datos" => $cliente,
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

    public function create_direccion($request)
    {
    	$direccion = new Direccion;
        $direccion->calle = $request->calle;
        $direccion->carrera = $request->carrera;
        $direccion->numero_casa =$request->numero_casa;
        $direccion->barrio = $request->barrio;
        $direccion->save();

        return $direccion;
    }


    public function create_cliente($request , $direccion_id)
    {
    	$cliente = new Cliente; 
        $cliente->nuip = $request->nuip;
        $cliente->primer_nombre=$request->primer_nombre;
        $cliente->segundo_nombre = $request->segundo_nombre;
        $cliente->primer_apellido =$request->primer_apellido;
        $cliente->segundo_apellido = $request->segundo_apellido;
        $cliente->correoelectronico = $request->correoelectronico;
        $cliente->direccion_id = $direccion_id;
        $cliente->save();

        return $cliente;
    }

    public function update_cliente($request, $id)
    {
    	return  $this->find_cliente($id)->update($request);
    }

    public function create_municipio_direccion($request , $cliente_id)
    {
    	$municipio_direccion = new Municipio_direccion;
        $municipio_direccion->direccion_id=$direccion->id;
        $municipio_direccion->municipio_id= $request->municipio_id;
        $municipio_direccion->cliente_id = $cliente_id;
        $municipio_direccion->save();

        return $municipio_direccion;

    }

    public function create_departamento_municipio($request, $cliente_id)
    {
    	$departamento_minicipio = new Departamento_municipio;
        $departamento_minicipio->departamento_id= $request->departamento_id;
        $departamento_minicipio->municipio_id = $request->municipio_id;
        $departamento_minicipio->cliente_id = $cliente_id;
        $departamento_minicipio->save();

        return $departamento_minicipio;
    }

    public function create_tipos_telefonos($request)
    {
    	$tipos_telefonos = new Tipos_telefonos;
        $tipos_telefonos->nombre_tipo = $request->nombre_tipo;
        $tipos_telefonos->save();

        return $tipos_telefonos;
    }

    public function create_cliente_telefonos($request,$tipos_telefonos_id)
    {
    	$cliente_telefonos = new Cliente_telefonos;
        $cliente_telefonos->numero_telefonico = $request->numero_telefonico;
        $cliente_telefonos->cliente_id= $cliente->id;
        $cliente_telefonos->tipo_id= $tipos_telefonos_id;
        $cliente_telefonos->save();
        return $cliente_telefonos;
    }



    





}
