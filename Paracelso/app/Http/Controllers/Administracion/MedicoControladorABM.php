<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;
use App\Http\Requests\MedicoRequest;
use Illuminate\Support\Facades\Session;

use App\Models\medicos;
use App\Models\Dominio;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Administracion\BitacoraControlador;

class MedicoControladorABM extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        session()->forget('codigo_transaccion');
        session()->forget('id_persona');
        session()->forget('nombre_persona');
        session()->forget('fecha_nacimiento');
        
        $medicos=medicos::all();

        return view('medico.LstMedicos',compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $codigo_transaccion='200';
        return redirect()->route('persona.show',compact('codigo_transaccion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicoRequest $request)
    {
        //
        $bitacora=new BitacoraControlador;
        $id_bitacora = $bitacora->generar_bitacora('200');

        $request->merge(['id_bitacora'=>$id_bitacora]);
        $request->merge(['id_persona'=>session()->get('id_persona')]);
        $request->merge(['codigo_institucion'=>Auth()->user()->codigo_institucion]);

        $medico=medicos::create($request->all());

        Session::flash('mensaje','Medico se Registro correctamente!');

        session()->forget('codigo_transaccion');
        session()->forget('id_persona');
        session()->forget('nombre_persona');
        session()->forget('fecha_nacimiento');
        
        return redirect()->route('medico.index');
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
        $medico=medicos::FindOrFail($id);
        $tipoEspecialidad = Dominio::nombre('TIPO ESPECIALIDAD')->lists('descripcion','codigo_dominio')->prepend('Elija una Especialidad');

        return view('medico.FrmEditarMedico',compact('medico','tipoEspecialidad'));
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
        $medico=medicos::FindOrFail($id);
        $bitacora=new BitacoraControlador;
        $id_bitacora=$bitacora->generar_bitacora('201');

        $request->merge(['id_bitacora'=>$id_bitacora]);

        $datos=$request->all();
        $medico->fill($datos)->save();

        Session::flash('mensaje','Datos de Medico se Actualizaron Correctamente!');

        return redirect()->route('medico.index');
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
