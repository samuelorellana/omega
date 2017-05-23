<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RevisionRequest extends Request
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
            'revision_general'=>'required|string|max:255',
            'cabeza_cuello'=>'string|max:150',
            'torax'=>'string|max:150',
            'miembros_superiores'=>'string|max:150',
            'abdomen'=>'string|max:150',
            'genital_urinario'=>'string|max:150',
            'miembros_inferiores'=>'string|max:150',
            'neurologico'=>'string|max:150',
            'otros'=>'string|max:150'
        ];
    }
}
