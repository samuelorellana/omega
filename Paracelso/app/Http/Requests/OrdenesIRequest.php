<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OrdenesIRequest extends Request
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
            'tipo_internacion'=>'required|string',
            'lugar_internacion'=>'string|max:100',
            'fecha_internacion'=>'date'
        ];
    }
}
