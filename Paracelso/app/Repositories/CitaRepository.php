<?php

namespace App\Repositories;

use App\Models\personas;
use App\Models\medicos;
use App\Models\citas;
use Carbon\Carbon;
use DB;

class CitaRepository
{
	public function RepCitaBuscar($fecha,$hora,$medico)
	{
    Carbon::setLocale('es');
        $fechaA = Carbon::now()->format('Y-m-d');
        $busca=[];

        if($fecha)
        {
          $fechaB= Carbon::parse($fecha)->format('Y-m-d');
            if($hora)
            { 
              $horaB = Carbon::parse($hora)->format('H:i:s');
                if($medico)
                  { $busca = ['fecha'=>$fechaB,'hora'=>$horaB,'id_medico'=>$medico]; }
                else
                  { $busca = ['fecha'=>$fechaB,'hora'=>$horaB]; }
            }
            else
            {
                if($medico)
                  { $busca = ['fecha'=>$fechaB,'id_medico'=>$medico]; }
                else 
                  { $busca = ['fecha'=>$fechaB]; }
            }            
        }
        else 
        { 
          if($hora)
          {
            $horaB = Carbon::parse($hora)->format('H:i:s');
                if($medico)
                  { $busca = ['fecha'=>$fechaA,'hora'=>$horaB,'id_medico'=>$medico]; }
                else
                  { $busca = ['fecha'=>$fechaA,'hora'=>$horaB]; }
          }
          else
            {
                if($medico)
                  { $busca = ['fecha'=>$fechaA,'id_medico'=>$medico]; }
                else 
                  { $busca = ['fecha'=>$fechaA]; }
            }
        }

        return citas::where('codigo_institucion',Auth()->user()->codigo_institucion)
                    ->where($busca)
                    ->orderBy('hora','asc')
                    ->get();

		// return Cita::select('citas.id_cita','citas.id_medico','citas.id_persona','citas.fecha','citas.hora','citas.motivo','citas.estado','medicos.id_medico','medicos.nombrem','medicos.apellidom','personas.id_persona','personas.nombre','personas.ap_paterno','personas.ap_materno','personas.codigo_institucion')
  //       ->join(DB::raw("(SELECT medicos.id_medico, medicos.id_persona, personas.nombre as nombreM, personas.ap_paterno as apellidoM FROM medicos INNER JOIN personas ON personas.id_persona = medicos.id_persona) as medicos"),function($q){
  //           $q->on('medicos.id_medico','=','citas.id_medico');
  //       })
  //       ->join('personas','personas.id_persona','=','citas.id_persona')
  //       ->where('personas.codigo_institucion','=',$codigo_institucion)
  //       ->where('citas.estado','!=','TCEC')
  //       ->where($busca)     
  //       ->orderBy('citas.hora','asc')
  //       ->get();
        
	}

    public function RepCitaEditar($id)
    {
        return Cita::select('citas.id_medico','citas.id_persona','citas.fecha','citas.hora','citas.motivo','citas.estado','medicos.id_medico','medicos.nombrem','medicos.apellidom','personas.nombre','personas.ap_paterno','personas.ap_materno','personas.codigo_institucion')
        ->join(DB::raw("(SELECT medicos.id_medico, medicos.id_persona, personas.nombre as nombreM, personas.ap_paterno as apellidoM FROM medicos INNER JOIN personas ON personas.id_persona = medicos.id_persona) as medicos"),function($q){
            $q->on('medicos.id_medico','=','citas.id_medico');
        })
        ->join('personas','personas.id_persona','=','citas.id_persona')
        ->where('citas.id_cita','=',$id)
        ->first();
    }
}