<?php

namespace App\Http\Controllers\Internacion;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\Http\Requests\OrdenesIRequest;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Administracion\BitacoraControlador;

use App\Models\Dominio;
use App\Models\ordenes_internacion;
use App\Models\evaluaciones_consultas;

use Carbon\Carbon;

class OrdenesIControladorABM extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrdenesIRequest $request)
    {
        //
        $codigo_transaccion = $request->codigo_transaccion;
        $bitacora = new BitacoraControlador;
        $idbitacora = $bitacora->generar_bitacora($codigo_transaccion);

        $request->merge(['id_bitacora' => $idbitacora ]);
        $request->merge(['id_persona'=>session()->get('id_persona')]);
        $request->merge(['codigo_institucion'=>Auth()->user()->codigo_institucion]);

        ordenes_internacion::create($request->all());

        //actualizo el tipo de conducta de la evaluacion
        $ec = evaluaciones_consultas::where('id_consulta',$request->id_consulta)->first();
        $ec->tipo_conducta = "TPCI"; //internacion regular por defecto
        $ec->save();

        Session::flash('mensaje','Orden de Internacion se Registro correctamente!');

        session()->forget('codigo_transaccion');
        session()->forget('id_persona');
        session()->forget('nombre_persona');
        session()->forget('fecha_nacimiento');

        return redirect()->route('cita.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
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

    //nueva
    public function ordeninternacion($idc,$idm,$codigo)
    {
        Carbon::setLocale('es');
        $fecha=Carbon::now();
        $tipoInternacion = Dominio::nombre('TIPO INTERNACION')->lists('descripcion','codigo_dominio');
        $id_consulta = $idc;
        $id_medico = $idm;
        $codigo_transaccion = $codigo;

        return view('internacion.FrmCrearOrdenInternacion',compact('fecha','tipoInternacion','id_consulta','id_medico','codigo_transaccion'));
    }

    public function ejecutarinternacion($id)
    {
        $orden = ordenes_internacion::FindOrFail($id);
        $orden->estado = "EJ";
        $orden->save();

        return redirect()->route('internacion.show',$orden->id_persona);
    }
}
