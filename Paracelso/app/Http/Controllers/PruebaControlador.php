<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use App\Models\medicos;
use App\Repositories\PersonaRepository;

use App\Http\Requests;
use App\Models\internaciones;

class PruebaControlador extends Controller
{
    protected $personas;

    public function __construct(PersonaRepository $personas)
    {
        $this->personas = $personas;
    }
    //
    public function index()
    {
    	$medicos = medicos::locales()->get();
    	$persona=array();
        foreach($medicos as $medico)
        {
            $personas=array();
            $personas['id_medico'] = $medico->id_medico;
            $personas['nombreM'] = $medico->personas->nombre.' '.$medico->personas->ap_paterno.' '.$medico->personas->ap_materno;
            array_push($persona,$personas);
        }
        $persona1 = Collection::make($persona);
    	//dd($persona1);
    	$personal = $persona1->lists('nombreM','id_medico');
        return view('pruebas',compact('personal'));
    }

    public function indexa()
    {
        $internaciones = internaciones::where('estado','AC')->with('ultimositio')->get();

        return view('prueba2',compact('internaciones'));
    }
}
