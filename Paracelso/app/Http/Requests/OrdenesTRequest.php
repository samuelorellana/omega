<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OrdenesTRequest extends Request
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
            'tipo_transferencia'=>'required|string',
            'motivo_transferencia'=>'required|string|max:350',
            'institucion'=>'string|max:100',
            'diagnosticos'=>'required|string|max:500',
            'notas'=>'string|max:500'
        ];
    }
}
