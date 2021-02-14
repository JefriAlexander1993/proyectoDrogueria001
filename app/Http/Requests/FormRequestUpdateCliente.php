<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestUpdateCliente extends FormRequest
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
            'nuip'=>'required',
            'primer_nombre'=>'required',
            'segundo_nombre'=>'required',
            'primer_apellido'=>'required',
            'segundo_apellido'=>'required',
        ];
    }
}
