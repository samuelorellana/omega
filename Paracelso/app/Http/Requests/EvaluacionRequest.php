<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EvaluacionRequest extends Request
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
            'laboratorio'=>'string|max:300',
            'gabinete'=>'string|max:300',
            'tipo_conducta'=>'string'
        ];
    }
}
