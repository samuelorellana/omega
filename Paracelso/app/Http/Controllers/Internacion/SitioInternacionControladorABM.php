<?php

namespace App\Http\Controllers\Internacion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SitiosIRequest;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Administracion\BitacoraControlador;

use App\Models\Dominio;
use App\Models\sitios_internaciones;

use Carbon\Carbon;
use App\Repositories\PersonaRepository;

class SitioInternacionControladorABM extends Controller
{
    protected $personas;

    public function __construct(PersonaRepository $personas)
    {
        $this->personas = $personas;
    }
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
    public function store(SitiosIRequest $request)
    {
        //
        if($request->ajax())
        {
            $bitacora = new BitacoraControlador;
            $id_bitacora= $bitacora->generar_bitacora('910');
            $request->merge(['id_bitacora' => $id_bitacora]);

            $resultado=sitios_internaciones::create($request->all()); 

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
    public function crearsitiointernacion($idi,$idm)
    {
        Carbon::setLocale('es');
        $fecha=Carbon::now();
        $medicos = $this->personas->RepMedicos()->lists('nombreM','id_medico');
        $tipoUnidad = Dominio::nombre('TIPO ESPECIALIDAD')->lists('descripcion','codigo_dominio');
        $tipoEvolucion = Dominio::nombre('TIPO EVOLUCION')->lists('descripcion','codigo_dominio');
        $tipoConducta = Dominio::nombre('TIPO CONDUCTAI')->lists('descripcion','codigo_dominio');
        return view('internacion.FrmCrearNotaInternacion',['fecha'=>$fecha,'medicos'=>$medicos,'id_internacion'=>$idi,'id_medico'=>$idm,'tipoUnidad'=>$tipoUnidad,'tipoEvolucion'=>$tipoEvolucion,'tipoConducta'=>$tipoConducta]);
    }

    public function cambiarsitiointernacion($idi,$idm)
    {
        Carbon::setLocale('es');
        $fecha=Carbon::now();
        // $medicos=medicos::locales()->get();
        $tipoUnidad = Dominio::nombre('TIPO ESPECIALIDAD')->lists('descripcion','codigo_dominio');
        // $tipoEvolucion = Dominio::nombre('TIPO EVOLUCION')->lists('descripcion','codigo_dominio');
        // $tipoConducta = Dominio::nombre('TIPO CONDUCTAI')->lists('descripcion','codigo_dominio');
        //return view('internacion.FrmCrearNotaInternacion',['fecha'=>$fecha,'medicos'=>$medicos,'id_internacion'=>$idi,'id_medico'=>$idm,'tipoUnidad'=>$tipoUnidad,'tipoEvolucion'=>$tipoEvolucion,'tipoConducta'=>$tipoConducta]);
    }

    public function ejecutarinternacion($id)
    {
        
    }
}
