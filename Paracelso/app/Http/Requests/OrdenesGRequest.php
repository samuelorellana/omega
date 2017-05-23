<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OrdenesGRequest extends Request
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
            'tipo_gabinete'=>'required|string',
            'orden'=>'string|max:300',
            'complemento'=>'string|max:150',
            'fecha_hora'=>'date'
        ];
    }
}
