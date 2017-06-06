<?php

namespace App\Repositories;
use Illuminate\Support\Collection as Collection;

use App\Models\personas;
use App\Models\medicos;
use Carbon\Carbon;

class PersonaRepository
{
	public function BuscarPersona($nombre,$ap_paterno,$ap_materno)
	{
        Carbon::setLocale('es');
		$personas = personas::with('institucion')
                    ->where('codigo_institucion',Auth()->user()->codigo_institucion)
                    ->where([       ['nombre', 'like',"%".$nombre."%"],
                                    ['ap_paterno', 'like',"%".$ap_paterno."%"],
                                    ['ap_materno', 'like',"%".$ap_materno."%"]
                                ])
                    ->orderBy('nombre','asc')
                    ->paginate(5);
        return $personas;
	}

    public function RepMedicos()
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
        $medico = Collection::make($persona);
        return $medico;
    }

}