<?php

namespace App\Http\Controllers\EvaluacionConsulta;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EvaluacionRequest;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Administracion\BitacoraControlador;

use App\Models\evaluaciones_consultas;

class EvaluacionConsultaControladorABM extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $id_persona = session()->get('id_persona');
        // //se obtiene el id de la persona de trabajo

        // //viene de btn crearDocs en frmcrearconsulta
        // if($request->ajax())
        // {
        //     if($request->opcion == 'TPCI' || $request->opcion =='TPCY')
        //     {
        //         return "internacion";
        //     }
        //     elseif($request->opcion == 'TPCC')
        //     {
        //         //OPCION : CONTROL EN CONSULTA
        //         session(['codigo_transaccion'=>'500']);
        //         //se carga codigo de transaccion para crear cita
        //         return response()->json(['success'=>'true','id'=>$id_persona,'mensaje'=>'Cita para Control en Consultorio']);
        //     }
        //     elseif($request->opcion == 'TPCT')
        //     {
        //         return "transferencia";
        //     }
        // }
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
    public function store(EvaluacionRequest $request)
    {
        //
        if($request->ajax())
        {
            $bitacora = new BitacoraControlador;
            $id_bitacora= $bitacora->generar_bitacora('620');
            $request->merge(['id_bitacora' => $id_bitacora]);

            $resultado=evaluaciones_consultas::create($request->all()); 

            if($resultado)
            {              
                $id = evaluaciones_consultas::all()->last()->id_evaluacion_consulta;
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
        if($request->ajax())
        {
            $bitacora = new BitacoraControlador;
            $id_bitacora= $bitacora->generar_bitacora('621');
            $request->merge(['id_bitacora' => $id_bitacora]);

            $evaluacion=evaluaciones_consultas::FindOrFail($id);

            $input=$request->all();
            $resultado=$evaluacion->fill($input)->save(); 

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
}
