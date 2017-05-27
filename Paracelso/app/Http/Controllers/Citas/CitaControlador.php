<?php

namespace App\Http\Controllers\Citas;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\CitaRepository;
use App\Repositories\PersonaRepository;

use App\Models\medicos;
use App\Models\citas;

class CitaControlador extends Controller
{
    protected $citas;
	protected $personas;

    public function __construct(CitaRepository $citas,PersonaRepository $personas)
    {
        $this->citas = $citas;
        $this->personas = $personas;
    }
    //
    public function crear()
    {
        $medicos=medicos::locales()->get();
        return view('cita.FrmCrearCita',compact('medicos'));
    }

    protected function BuscarCita(Request $request)
    {
        Carbon::setLocale('es');
        $fecha=Carbon::Parse($request->fecha);
        $citas = $this->citas->RepCitaBuscar($request->fecha,$request->hora,$request->id_medico);

        return view('cita.LstCitas',compact('citas','fecha'));
    }

    protected function CancelarCita($id)
    {
        $cita=citas::FindOrFail($id);
        return view('cita.FrmCancelarCita',compact('cita'));
    }

    protected function ConfirmarC($id)
    {
        $cita = citas::FindOrFail($id);
        $cita->estado = "TCEC";
        $cita->save();

        return redirect()->route('cita.index');
    }

    protected function Calendario(Request $request)
    {
        $citas=citas::where('codigo_institucion',Auth()->user()->codigo_institucion)->get();

        

        $eventos =array();

        foreach($citas as $cita)
        {
            $idc=$cita->id_cita;
            $nombre = $cita->personas->nombre.' '.$cita->personas->ap_paterno;
            $medico = $cita->medicos->personas->nombre.' '.$cita->medicos->personas->ap_paterno;
            $motivo = $cita->motivo;
            $fecha=$cita->fecha->toDateString();
            $hora1=$cita->hora;
            $inicio = Carbon::createFromFormat('Y-m-d H:i:s',$fecha.' '.$hora1)->toDateTimeString();
            $fin = Carbon::createFromFormat('Y-m-d H:i:s',$fecha.' '.$hora1)->addMinutes(30)->toDateTimeString();
            $ev = array();
                $ev['id']=$idc;
                $ev['title']=$nombre;
                $ev['start']=$inicio;
                $ev['end']=$fin;
                $ev['content']=$medico;
                $ev['motivo']=$motivo;
                //$ev['class']=$cita['color'];
                $ev['allDay']=false;

            array_push($eventos, $ev);
        }

        //dd($eventos);

        echo json_encode($eventos);
    }

    public function VistaCalendario()
    {
        return view('cita.LstCalendario');
    }

    public function seleccionarC($id)
    {
        session(['codigo_transaccion' => '100']);
        return redirect()->route('SeleccionarPersona',['id'=>$id]);
    }
}
