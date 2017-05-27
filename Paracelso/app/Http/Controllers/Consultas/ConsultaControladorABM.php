<?php

namespace App\Http\Controllers\Consultas;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ConsultaRequest;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Administracion\BitacoraControlador;

use App\Models\consultas;
use App\Models\medicos;
use App\Models\Dominio;
use App\Models\medicamentos;
use App\Models\revisiones_consultas;
use App\Models\evaluaciones_consultas;

use Carbon\Carbon;

class ConsultaControladorABM extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_consulta=0;
        return view('consulta.FrmMenuFinConsulta',compact('id_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Carbon::setLocale('es');
        $fecha=Carbon::now();
        $medicos=medicos::locales()->get();
        $tipoConsulta = Dominio::nombre('TIPO CONSULTA')->lists('descripcion','codigo_dominio');
        $tipoDiagnostico = Dominio::nombre('TIPO DIAGNOSTICO')->lists('descripcion','codigo_dominio');
        $tipoLaboratorio = Dominio::nombre('TIPO LABORATORIO')->lists('descripcion','codigo_dominio');
        $tipoGabinete = Dominio::nombre('TIPO GABINETE')->lists('descripcion','codigo_dominio');
        $tipoTratamiento = Dominio::nombre('TIPO TRATAMIENTO')->lists('descripcion','codigo_dominio');
        $tipoConducta = Dominio::nombre('TIPO CONDUCTA')->lists('descripcion','codigo_dominio');
        $medicamentos = medicamentos::orderBy('nombre_medico','asc')->get();

        return view('consulta.FrmCrearConsulta',compact('fecha','medicos','tipoConsulta','tipoDiagnostico','tipoLaboratorio','tipoGabinete','tipoTratamiento','tipoConducta','medicamentos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsultaRequest $request)
    {
        //
        if($request->ajax())
        {
            $id_persona=session('id_persona');
            $bitacora = new BitacoraControlador;
            $id_bitacora= $bitacora->generar_bitacora('600');
            $request->merge(['id_bitacora' => $id_bitacora]);
            $request->merge(['codigo_institucion' => Auth()->user()->codigo_institucion]);
            $request->merge(['id_persona' => $id_persona]);

            $resultado=consultas::create($request->all()); 

            if($resultado)
            {              
                $id = consultas::all()->last()->id_consulta;
                return response()->json(['success'=>'true','id'=>$id]);

            }
            else
            {
                return response()->json(['success'=>'false']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fecha = Carbon::now()->format('Y-m-d');

        $consultas = consultas::where('fecha',$fecha)
        ->where('id_persona',$id)
        ->get();

        //$numero = count($consultas);

        if(!$consultas->isEmpty())
        {
            return view('consulta.FrmOpcionConsulta',compact('fecha','consultas'));
        }
        else
        {
            return redirect()->route('consulta.create');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        Carbon::setLocale('es');
        $fecha=Carbon::now();
        $medicos=medicos::locales()->get();
        $tipoConsulta = Dominio::nombre('TIPO CONSULTA')->lists('descripcion','codigo_dominio');
        $tipoDiagnostico = Dominio::nombre('TIPO DIAGNOSTICO')->lists('descripcion','codigo_dominio');
        $tipoLaboratorio = Dominio::nombre('TIPO LABORATORIO')->lists('descripcion','codigo_dominio');
        $tipoGabinete = Dominio::nombre('TIPO GABINETE')->lists('descripcion','codigo_dominio');
        $tipoTratamiento = Dominio::nombre('TIPO TRATAMIENTO')->lists('descripcion','codigo_dominio');
        $tipoConducta = Dominio::nombre('TIPO CONDUCTA')->lists('descripcion','codigo_dominio');
        $medicamentos = medicamentos::orderBy('nombre_medico','asc')->get();
        $consulta = consultas::FindOrFail($id);
        $revision = revisiones_consultas::where('id_consulta',$id)->first();
        $evaluacion = evaluaciones_consultas::where('id_consulta',$id)->first();
        //return $consulta;

        return view('consulta.FrmEditarConsulta',compact('fecha','consulta','revision','evaluacion','medicos','tipoConsulta','tipoDiagnostico','tipoLaboratorio','tipoGabinete','tipoTratamiento','tipoConducta','medicamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if($request->ajax())
        {
            $id_persona=session('id_persona');
            $bitacora = new BitacoraControlador;
            $id_bitacora= $bitacora->generar_bitacora('601');
            $request->merge(['id_bitacora' => $id_bitacora]);
            $request->merge(['codigo_institucion' => Auth()->user()->codigo_institucion]);
            $request->merge(['id_persona' => $id_persona]);

            $consulta = consultas::FindOrFail($id);
            $input = $request->all();
            $resultado=$consulta->fill($input)->save();

            if($resultado)
            {              
                return response()->json(['success'=>'true']);

            }
            else
            {
                return response()->json(['success'=>'false']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //nuevo
    public function consultamenu($idc,$idm)
    {
        $id_consulta=$idc;
        $id_medico=$idm;
        return view('consulta.FrmMenuFinConsulta',compact('id_consulta','id_medico'));
    }

    public function redireccion($idc,$idm,$codigo)
    {
        if($codigo == 500)
        {
            session(['codigo_transaccion'=>$codigo]);
            return redirect()->route('SeleccionarPersona',session()->get('id_persona'));
        }
        
    }
}
