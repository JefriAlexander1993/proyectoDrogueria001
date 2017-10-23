<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'codigo'=>'required',
           'fechaLlegada'=>'required',
           'nombre'=>'required',
           'rubio'=>'required',
           'nombreProveedor'=>'required',
           'precioUnitario'=>'required',
           'cantidad'=>'required',
           'totalCompra'=>'required',
           'iva'=>'required',
           'precioVenta'=>'required',
           'fechaVencimiento'=>'required', 
           'stock'=>'required'
        ];
    }
}
