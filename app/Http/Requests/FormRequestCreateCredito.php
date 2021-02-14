<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestCreateCredito extends FormRequest
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
            
            'total_credito'=>'required|numeric',
            'valor_de_cuota'=>'required|numeric|min:1',
            'forma_de_pago'=>'required',
            'cantidad_de_cuotas'=>'required|numeric',
      
        ];
    }
}
