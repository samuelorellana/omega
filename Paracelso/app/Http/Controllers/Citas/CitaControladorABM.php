<?php

namespace App\Http\Controllers\Citas;

use Illuminate\Support\Collection as Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\Http\Requests\CitaRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Models\citas;
//use App\Models\medicos;

use App\Http\Controllers\Administracion\BitacoraControlador;

use App\Repositories\CitaRepository;
use App\Repositories\PersonaRepository;

class CitaControladorABM extends Controller
{
    protected $citas;
    protected $personas;

    public function __construct(CitaRepository $citas, PersonaRepository $personas)
    {
        $this->citas = $citas;
        $this->personas = $personas;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->forget('codigo_transaccion');
        session()->forget('id_persona');
        session()->forget('nombre_persona');
        session()->forget('fecha_nacimiento');

        Carbon::setLocale('es');
        $fecha=Carbon::now();
        $medicos = $this->personas->RepMedicos()->lists('nombreM','id_medico');
        $citas = $this->citas->RepCitaBuscar($fecha,'','');
        return view('cita.FrmBuscarCitas',compact('fecha','medicos','citas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $codigo_transaccion="500"; //esto es crear cita nueva...
        return redirect()->route('persona.show',[$codigo_transaccion]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CitaRequest $request)
    {
        //
        $codigo_transaccion=session('codigo_transaccion');

        $bitacora = new BitacoraControlador;

        $idbitacora = $bitacora->generar_bitacora($codigo_transaccion);

        $request->merge(['id_bitacora' => $idbitacora ]);
        $request->merge(['id_persona'=>session()->get('id_persona')]);
        $request->merge(['codigo_institucion'=>Auth()->user()->codigo_institucion]);

        citas::create($request->all());

        Session::flash('mensaje','Cita se Registro correctamente!');

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
        $medicos = $this->personas->RepMedicos()->lists('nombreM','id_medico');
        $cita = citas::FindOrFail($id);

        return view('cita.FrmEditarCita',compact('medicos','cita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CitaRequest $request, $id)
    {
        //
        $cita = citas::FindOrFail($id);

        $bitacora = new BitacoraControlador;
        $id_bitacora = $bitacora->generar_bitacora('501');
        $request->merge(['id_bitacora'=>$id_bitacora]);

        $datos= $request->all();
        $cita->fill($datos)->save();

        Session::flash('mensaje','Cita se actualizo correctamente!');

        return redirect()->route('cita.index');
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
}
