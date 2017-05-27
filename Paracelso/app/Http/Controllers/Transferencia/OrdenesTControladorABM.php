<?php

namespace App\Http\Controllers\Transferencia;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\Http\Requests\OrdenesTRequest;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Administracion\BitacoraControlador;

use App\Models\Dominio;
use App\Models\ordenes_transferencia;
use App\Models\consultas;
use App\Models\evaluaciones_consultas;

use Carbon\Carbon;

class OrdenesTControladorABM extends Controller
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
    public function store(OrdenesTRequest $request)
    {
        //
        $codigo_transaccion = $request->codigo_transaccion;
        $bitacora = new BitacoraControlador;
        $idbitacora = $bitacora->generar_bitacora($codigo_transaccion);

        $request->merge(['id_bitacora' => $idbitacora ]);
        $request->merge(['id_persona'=>session()->get('id_persona')]);
        $request->merge(['codigo_institucion'=>Auth()->user()->codigo_institucion]);

        ordenes_transferencia::create($request->all());

        if($codigo_transaccion == 800)
        {
           //actualizo el tipo de conducta de la evaluacion
            $ec = evaluaciones_consultas::where('id_consulta',$request->id_origen)->first();
            $ec->tipo_conducta = "TPCT"; //transferencia
            $ec->save(); 
        }
        //aqui debe ir la actualizacion de conducta de internacion

        Session::flash('mensaje','Orden de Transferencia se Registro correctamente!');

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
    public function ordentransferencia($idc,$idm,$codigo)
    {
        Carbon::setLocale('es');
        $fecha=Carbon::now();
        $tipoTransferencia = Dominio::nombre('TIPO TRANSFERENCIA')->lists('descripcion','codigo_dominio');
        
        //discrimino si la transferencia viene desde consulta o desde internacion
        if($codigo == 800)
        {
            // si viene de consulta externa...
            $id_origen = $idc;
            $origen = 'C';
            //$consulta = consultas::FindOrFail($idc);
            // podrian cargarse los diagnosticos de la consulta en caso necesario... por el momento esta abierto el campo diagnosticos
        }
        // codigo 810 sera desde internacion...


        
        $id_medico = $idm;
        $codigo_transaccion = $codigo;

        return view('transferencia.FrmCrearOrdenTransferencia',compact('fecha','tipoTransferencia','id_origen','origen','id_medico','codigo_transaccion'));
    }
}
