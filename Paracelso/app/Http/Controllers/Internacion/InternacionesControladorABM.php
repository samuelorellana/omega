<?php

namespace App\Http\Controllers\Internacion;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\Http\Requests\InternacionesRequest;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Administracion\BitacoraControlador;

use App\Models\ordenes_internacion;
use App\Models\Dominio;
use App\Models\internaciones;

use Carbon\Carbon;
use App\Repositories\PersonaRepository;

class InternacionesControladorABM extends Controller
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
        session()->forget('codigo_transaccion');
        session()->forget('id_persona');
        session()->forget('nombre_persona');
        session()->forget('fecha_nacimiento');

        $ordenes = ordenes_internacion::where('estado','AC')->get();
        $internaciones = internaciones::where('estado','AC')->with('ultimositio')->get();
        return view('internacion.LstOrdenesInternacion',compact('ordenes','internaciones'));

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
    public function store(InternacionesRequest $request)
    {
        //
        $codigo_transaccion=session('codigo_transaccion');

        $bitacora = new BitacoraControlador;

        $idbitacora = $bitacora->generar_bitacora($codigo_transaccion);

        $request->merge(['id_bitacora' => $idbitacora ]);
        $request->merge(['id_persona'=>session()->get('id_persona')]);
        $request->merge(['codigo_institucion'=>Auth()->user()->codigo_institucion]);

        $internacion = internaciones::create($request->all());

        Session::flash('mensaje','Registro creado correctamente!, puede continuar');

        //en este caso no borro las variables de sesion... pues se siguen utilizando en los siguientes formularios

        //redirecciono a formulario de evolucion y ordenes
        return redirect()->route('crearsitiointernacion',[$internacion->id_internacion,$internacion->id_medico]); 
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
        if($id == 0)
        {
            $codigo_transaccion="900"; //esto es crear internacion nueva...
            return redirect()->route('persona.show',[$codigo_transaccion]);
        }
        else
        {
            session(['codigo_transaccion'=>'900']); //crear internacion para la persona elegida...
            return redirect()->route('SeleccionarPersona',['id'=>$id]);
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

    //nueva
    public function crear()
    {
        Carbon::setLocale('es');
        $fecha=Carbon::now();
        $tipoInternacion = Dominio::nombre('TIPO INTERNACION')->lists('descripcion','codigo_dominio');
        $medicos = $this->personas->RepMedicos()->lists('nombreM','id_medico');

        return view('internacion.FrmCrearInternacion',compact('fecha','tipoInternacion','medicos'));
    }
}
