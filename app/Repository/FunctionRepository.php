<?php

namespace App\Repository;


use App\Departamento;
use App\Municipio;
use App\Cliente;
use App\Articulo;
use App\Venta;


class FunctionRepository 
{
    public function all_departamentos()
    {
    	return Departamento::pluck('nombre','id');
    }

    public function all_municipios()
    {
    	return Municipio::pluck('nombre','id');
    }

     public function find_cliente($id)
    {	
         	return Cliente::findOrFail($id); 
    }

    public function all_article_select()
    {
        return Articulo::where('cantidad','>',0)->pluck('nombre','codigo');
    }

    public function all_client_select()
    {
       return Cliente::select('id','nuip','primer_nombre','primer_apellido')->get();
    }

    public function data_chart($year){

        $enero = Venta::whereYear('created_at',$year)->whereMonth('created_at', '1')->sum('totalventa');
        $febrero = Venta::whereYear('created_at',$year)->whereMonth('created_at', '2')->sum('totalventa');
        $marzo = Venta::whereYear('created_at',$year)->whereMonth('created_at', '3')->sum('totalventa');
        $abril = Venta::whereYear('created_at',$year)->whereMonth('created_at', '4')->sum('totalventa');
        $mayo = Venta::whereYear('created_at',$year)->whereMonth('created_at', '5')->sum('totalventa');
        $junio = Venta::whereYear('created_at',$year)->whereMonth('created_at', '6')->sum('totalventa');
        $julio = Venta::whereYear('created_at',$year)->whereMonth('created_at', '7')->sum('totalventa');
        $agosto = Venta::whereYear('created_at',$year)->whereMonth('created_at', '8')->sum('totalventa');
        $septiembre = Venta::whereYear('created_at',$year)->whereMonth('created_at', '9')->sum('totalventa');
        $octubre = Venta::whereYear('created_at',$year)->whereMonth('created_at', '10')->sum('totalventa');
        $noviembre = Venta::whereYear('created_at',$year)->whereMonth('created_at', '11')->sum('totalventa');
        $diciembre = Venta::whereYear('created_at',$year)->whereMonth('created_at', '12')->sum('totalventa');
        $total_venta_año =Venta::whereYear('created_at',$year)->sum('totalventa');
        $hoy_ventas =  Venta::whereDate('created_at', today())->sum('totalventa');
    
        $mensual_ventas= Venta::whereMonth('created_at',date('n'))->sum('totalventa');
        

        $data = array(
            0=>$enero,
            1=>$febrero,
            2=>$marzo,
            3=>$abril,
            4=>$mayo,   
            5=>$junio,
            6=>$julio,
            7=>$agosto,
            8=>$septiembre,
            9=>$octubre,
            10=>$noviembre,
            11=>$diciembre,
            12=>$total_venta_año,
            13=>$hoy_ventas,
            14=>$mensual_ventas

        );

        return $data;

    }

}
