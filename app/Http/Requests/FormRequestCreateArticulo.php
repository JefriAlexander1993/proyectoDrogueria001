<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestCreateArticulo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        return [
            'nombre'=> 'required|unique:articulos',
            'codigo'=> 'required',
            'fechavencimiento'=> 'required|date',
            'preciounitario'=> 'required|min:1', 
            'precioventa'=> 'required|min:1', 
            'stockmin'=> 'required|min:1', 
        ];
    }
}
