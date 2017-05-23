<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TratamientosHRequest extends Request
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
            'tratamiento'=>'required|string|max:50'
            'causa_tratamiento'=>'string|max:100',
            'modo_tratamiento'=>'string|max:50'
        ];
    }
}
