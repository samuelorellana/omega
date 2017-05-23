<?php

namespace App\Http\Controllers\Personas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\Http\Requests\PersonaRequest;
use App\Http\Controllers\Controller;

use App\Models\personas;
use App\Models\Dominio;

use App\Http\Controllers\Administracion\BitacoraControlador;

class PersonaControladorABM extends Controller
{
    private $bitacora;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $persona = personas::all();

        dd($persona);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $codigo_transaccion='';
        // if(Session::has('usuario'))
        // {
        //     $codigo_transaccion='1000';
        // }
        // else
        // {
        //     $codigo_transaccion='100';
        // }
        
        session()->forget('usuario');
        $tipoDocumento = Dominio::nombre('TIPO DOCUMENTO')->lists('descripcion','codigo_dominio');
        //$tipoSeguro = Dominio::nombre('TIPO SEGURO')->lists('descripcion','codigo_dominio')->prepend('Elija un tipo de Seguro');

        return view('persona.FrmCrearPersona',compact('tipoDocumento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaRequest $request)
    {
        //aqui debe ir codigo para las variables de session
        $codigo = session()->get('codigo');
        $bitacora = new BitacoraControlador;
        $id_bitacora = $bitacora->generar_bitacora($codigo);
        $request->merge(['id_bitacora'=>$id_bitacora]);
        $request->merge(['codigo_institucion'=>Auth()->user()->codigo_institucion]);

        $persona=personas::create($request->all());

        Session::flash('mensaje','Persona se Registro correctamente!');

        //la redireccion deberia enviar a la ruta de seleccionar persona...OJO
        return redirect()->route('SeleccionarPersona',['id'=>$persona->id_persona]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigo_transaccion)
    {
        session()->forget('codigo_transaccion');
        session()->forget('id_persona');
        session()->forget('nombre_persona');
        session()->forget('fecha_nacimiento');
        
        // redirige de acuerdo al codigo de transaccion
        if($codigo_transaccion == 'show') {$codigo_transaccion='100';}
        session(['codigo_transaccion'=>$codigo_transaccion]);
        //return view('persona.FrmBuscarPersona',compact('codigo_transaccion'));
        return view('persona.FrmBuscarPersona');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_persona)
    {
        //
        $persona=personas::FindOrFail($id_persona);
        $tipoDocumento = Dominio::nombre('TIPO DOCUMENTO')->lists('descripcion','codigo_dominio');
        //$tipoSeguro = Dominio::nombre('TIPO SEGURO')->lists('descripcion','codigo_dominio')->prepend('Elija un tipo de Seguro');
        $codigo_transaccion=session()->get('codigo_transaccion');
        // if(Session::has('usuario'))
        // {
        //     $codigo_transaccion='1001';
        // }
        // else
        // {
        //     $codigo_transaccion='101';
        // }
        
        session()->forget('usuario');
        
        return view('persona.FrmEditarPersona', compact('persona','tipoDocumento'));
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
        $persona = personas::FindOrFail($id);
        $codigo=session()->get('codigo_transaccion');
        $bitacora = new BitacoraControlador;
        $id_bitacora = $bitacora->generar_bitacora($codigo);
        $request->merge(['id_bitacora'=>$id_bitacora]);
        $request->merge(['codigo_institucion'=>Auth()->user()->codigo_institucion]);

        $datos = $request->all();
        $persona->fill($datos)->save();

        Session::flash('mensaje','Datos de Persona se Actualizaron correctamente!');

        return redirect()->route('SeleccionarPersona',['id'=>$id]);
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
