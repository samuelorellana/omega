<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PersonaRequest extends Request
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
            'nombre'=>'required|string|max:50',
            'ap_paterno'=>'string|max:50',
            'ap_materno'=>'string|max:50',
            'fecha_nacimiento'=>'date',
            'documento_identidad'=>'numeric',
            'sexo'=>'string|max:2',
            'email'=>'email|unique:personas',
            'no_telefono'=>'numeric',
            'no_celular'=>'numeric',
            'no_telefono_trabajo'=>'numeric',
            'direccion'=>'max:100',
            'ciudad_residencia'=>'max:50',
            'lugar_nacimiento'=>'max:50',
            // 'codigo_seguro'=>'max:20',
            // 'matricula_seguro'=>'max:20',
            'religion'=>'string|max:20',
            'observaciones'=>'string|max:200'
        ];
    }
}
