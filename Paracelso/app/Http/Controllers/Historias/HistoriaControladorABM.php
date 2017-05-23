<?php

namespace App\Http\Controllers\Historias;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\HistoriaRequest;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Administracion\BitacoraControlador;

use Carbon\Carbon;

use App\Models\historia_clinica;
use App\Models\medicos;
use App\Models\Dominio;

class HistoriaControladorABM extends Controller
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
    public function store(HistoriaRequest $request)
    {
        //
        if($request->ajax())
        {
            $bitacora = new BitacoraControlador;
            $id_bitacora= $bitacora->generar_bitacora('300');
            $request->merge(['id_bitacora' => $id_bitacora]);
            $request->merge(['codigo_institucion' => Auth()->user()->codigo_institucion]);
            $request->merge(['id_persona' => session()->get('id_persona')]);

            $resultado=historia_clinica::create($request->all()); 

            if($resultado)
            {              
                $id = historia_clinica::all()->last()->id_historia;
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
        //
        Carbon::setLocale('es');
        $fecha=Carbon::now();
        $medicos=medicos::locales()->get();
        $tipoAlergia = Dominio::nombre('TIPO ALERGIA')->lists('descripcion','codigo_dominio');
        $tipoAntecedente = Dominio::nombre('TIPO ANTECEDENTE')->lists('descripcion','codigo_dominio');

        $historia = historia_clinica::where('id_persona',$id)->first();
        //verifica si existe o no la historia 
        if ($historia != null)
        {
            return view('historia.FrmVerHistoria',compact('historia','tipoAlergia','tipoAntecedente'));
        }
        else
        {          
            return view('historia.FrmCrearHistoria',compact('fecha','medicos','tipoAlergia','tipoAntecedente'));
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
