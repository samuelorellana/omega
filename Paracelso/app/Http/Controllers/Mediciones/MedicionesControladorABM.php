<?php

namespace App\Http\Controllers\Mediciones;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MedicionRequest;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use App\Http\Controllers\Administracion\BitacoraControlador;

use App\Models\mediciones;

class MedicionesControladorABM extends Controller
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
    public function store(MedicionRequest $request)
    {
        //
        $id_persona=session('id_persona');
        $bitacora = new BitacoraControlador;
        $idbitacora = $bitacora->generar_bitacora('700');
        $request->merge(['id_persona'=>$id_persona]);
        $request -> merge(['id_bitacora' => $idbitacora]);        
        $medicion = mediciones::create($request->all());
        
        return redirect()->route('medicion.show',$id_persona);
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
        Carbon::setLocale('es');
        $fecha=Carbon::now();
        $mediciones = mediciones::where('id_persona',$id)->orderBy('created_at','desc')->get();

        return view('mediciones.FrmMediciones',compact('fecha','mediciones'));
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
}
