<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SitiosIRequest extends Request
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
            'tipo_unidad'=>'required|string',
            'piso'=>'required|string|max:4',
            'cama'=>'required|string|max:4',
            'notas'=>'string|max:150'
        ];
    }
}
