<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DiagnosticosCRequest extends Request
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
            'tipo_diagnostico'=>'required|string',
            'codigo_cie'=>'string|max:10',
            'descripcion'=>'required|string|max:300'
        ];
    }
}
