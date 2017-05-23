<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DominiosRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // aqui puede incluirse codigo para evitar que un usuario cambie o edite el contenido que pertence a otro usuario... o se validan los permisos de usuario... etc
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
            'nombre' => 'required|max:200',
            'codigo_dominio' => 'required|unique:pa_dominios|max:6',
            'descripcion' => 'required|max:200'
        ];
    }
}
