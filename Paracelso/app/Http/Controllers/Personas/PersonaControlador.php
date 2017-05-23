<?php

namespace App\Http\Controllers\Personas;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\PersonaRepository;
use App\Models\personas;
use Carbon\Carbon;

class PersonaControlador extends Controller
{
    //
    protected $personas;

    public function __construct(PersonaRepository $personas)
    {
        $this->personas = $personas;
    }

    protected function BuscarPersona(Request $request)
    {
    	$personas=$this->personas->BuscarPersona($request->nombre,$request->ap_paterno,$request->ap_materno);

        return view('persona.LstPersonas',compact('personas'));
    }

    protected function SeleccionarPersona($id_persona)
    {
        //OPCION 1
        //$persona = $this->personas->ObtenerPersona($id_persona);
        //OPCION 2
        Carbon::setLocale('es');
        $persona=personas::FindOrFail($id_persona);
        
        session(['id_persona' => $persona->id_persona]);
        session(['nombre_persona' => $persona->nombre.' '.$persona->ap_paterno.' '.$persona->ap_materno]);
        session(['fecha_nacimiento' => $persona->fecha_nacimiento]);      
              
        //comprobar que existan datos de seguro
        // if($persona->codigo_seguro !== null) { $resultado=1;}
        // else { $resultado=0; }
        $codigo_transaccion=session()->get('codigo_transaccion');
        switch ($codigo_transaccion) {

            case '100': //ESTE CODIGO DE TRANSACCION ES EL DE LISTAR LAS PERSONAS DEBE IR A DETALLES DE PERSONA... EDITAR?
                //return redirect()->route('persona.edit',$id_persona);
                return view('persona.FrmMenu');
            case '101':
                return view('persona.FrmMenu');

            case '1001':
                return redirect()->route('usuario.show',Auth()->user()->id);

            case '1000':
                //en caso de crear nueva persona para el usuario...
                return view('usuario.FrmCrearUsuario');

            case '200':
                return redirect()->route('crearmedico');

            case '500':
                return redirect()->route('crearcita');
                
            break;
        }


        //return view('prueba');
    }
}
