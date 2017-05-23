<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Dominio;

class MedicoControlador extends Controller
{
    //
    public function crear()
    {
        $tipoEspecialidad = Dominio::nombre('TIPO ESPECIALIDAD')->lists('descripcion','codigo_dominio')->prepend('Elija una Especialidad');

        return view('medico.FrmCrearMedico',compact('tipoEspecialidad'));
    }
}
