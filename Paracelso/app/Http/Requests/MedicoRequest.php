<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MedicoRequest extends Request
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
            'codigo_especialidad'=>'required|string|max:4',
            'matricula_min_salud'=>'string|max:10',
            'matricula_col_medico'=>'string|max:10',
            'ranking'=>'numeric',
            'alma_mater'=>'string|max:100'
        ];
    }
}
