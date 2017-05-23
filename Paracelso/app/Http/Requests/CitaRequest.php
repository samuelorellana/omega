<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CitaRequest extends Request
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
            'id_medico'=>'required|numeric|min:1',
            'motivo'=>'required|string|max:50',
            'fecha'=>'required|date',
            'hora'=>'required|date_format:H:i'
        ];
    }
}
