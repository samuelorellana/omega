<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EvolucionesRequest extends Request
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
            'tipo_evolucion'=>'required|string',
            'subjetivo'=>'required|string|max:500',
            'objetivo'=>'string|max:500',
            'glasgow'=>'numeric|max:15|min:3',
            'frecuencia_cardiaca'=>'numeric|max:210|min:0',
            'frecuencia_respiratoria'=>'numeric|max:100|min:0',
            'presion_sistolica'=>'numeric|max:250|min:0',
            'presion_diastolica'=>'numeric|max:180|min:0',
            'peso'=>'numeric|max:220.00|min:0.39',
            'talla'=>'numeric|max:220|min:0',
            'temperatura'=>'numeric|max:44.0|min:0.0',
            'plan'=>'required|string|max:500',
            'tipo_conducta'=>'required|string'
        ];
    }
}
