<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

// Route::resource('dominios','Parametricas\DominiosControlador');
// Route::resource('seguros','Parametricas\SeguroControladorABM');

// route::resource('persona','Personas\PersonaControladorABM');
// route::get('/BuscarPersona','Personas\PersonaControlador@BuscarPersona');

Route::group(['middleware' => ['auth']],function(){

	route::get('prueba',['as'=>'prueba','uses'=>'PruebaControlador@index']);

	Route::resource('dominios','Parametricas\DominiosControlador');
	Route::resource('seguros','Parametricas\SeguroControladorABM');

	route::resource('persona','Personas\PersonaControladorABM');
	route::get('BuscarPersona/{page?}','Personas\PersonaControlador@BuscarPersona');
	route::get('/SeleccionarPersona/{id_persona}',['as'=>'SeleccionarPersona','uses'=>'Personas\PersonaControlador@SeleccionarPersona']);

	route::resource('usuario','Administracion\UsuarioControladorABM');

	route::resource('medico','Administracion\MedicoControladorABM');
	route::get('crearmedico',['as'=>'crearmedico','uses'=>'Administracion\MedicoControlador@crear']);

	route::resource('cita','Citas\CitaControladorABM');
	route::get('crearcita',['as'=>'crearcita','uses'=>'Citas\CitaControlador@crear']);
	route::get('BuscarCita','Citas\CitaControlador@BuscarCita');
	route::get('/CancelarCita/{id}',['as'=>'CancelarCita','uses'=>'Citas\CitaControlador@CancelarCita']);
	route::get('/ConfirmarC/{id}',['as'=>'ConfirmarC','uses'=>'Citas\CitaControlador@ConfirmarC']);
	route::post('/CalendarioCitas','Citas\CitaControlador@calendario');
	route::get('Calendario',['as'=>'Calendario','uses'=>'Citas\CitaControlador@VistaCalendario']);
	route::get('/seleccionarC/{id}',['as'=>'seleccionarC','uses'=>'Citas\CitaControlador@seleccionarC']);

	route::resource('historia','Historias\HistoriaControladorABM');
	route::resource('alergia','Alergias\AlergiaControladorABM');
	route::resource('diagnosticosH','DiagnosticosH\DiagnosticosHControladorABM');
	route::resource('tratamientosH','TratamientosH\TratamientosHControladorABM');
	route::resource('antecedentesH','AntecedentesH\AntecedentesHControladorABM');
	route::resource('anamnesisH','AnamnesisH\AnamnesisHControladorABM');

	route::resource('consulta','Consultas\ConsultaControladorABM');
	route::resource('revisionconsulta','RevisionConsulta\RevisionConsultaControladorABM');
	route::resource('evaluacionconsulta','EvaluacionConsulta\EvaluacionConsultaControladorABM');
	route::resource('diagnosticosC','DiagnosticosC\DiagnosticosCControladorABM');
	route::resource('ordenesL','OrdenesL\OrdenesLControladorABM');
	route::resource('ordenesG','OrdenesG\OrdenesGControladorABM');
	route::resource('tratamientosC','TratamientosC\TratamientosCControladorABM');
	route::get('/consultamenu/{idc}/{idm}',['as'=>'consultamenu','uses'=>'Consultas\ConsultaControladorABM@consultamenu']);
	route::get('/redireccion/{idc}/{idm}/{codigo}',['as'=>'redireccion','uses'=>'Consultas\ConsultaControladorABM@redireccion']);

	route::resource('ordenesI','Internacion\OrdenesIControladorABM');
	route::get('/ordeninternacion/{idc}/{idm}/{codigo}',['as'=>'ordeninternacion','uses'=>'Internacion\OrdenesIControladorABM@ordeninternacion']);

	route::resource('ordenesT','Transferencia\OrdenesTControladorABM');
	route::get('/ordentransferencia/{idc}/{idm}/{codigo}',['as'=>'ordentransferencia','uses'=>'Transferencia\OrdenesTControladorABM@ordentransferencia']);

	route::resource('internacion','Internacion\InternacionesControladorABM');
	route::get('crearinternacion',['as'=>'crearinternacion','uses'=>'Internacion\InternacionesControladorABM@crear']);
	route::resource('sitiointernacion','Internacion\SitioInternacionControladorABM');
	route::get('/crearsitiointernacion/{idi}/{idm}',['as'=>'crearsitiointernacion','uses'=>'Internacion\SitioInternacionControladorABM@crearsitiointernacion']);
	route::get('/cambiarsitiointernacion/{idi}/{idm}',['as'=>'cambiarsitiointernacion','uses'=>'Internacion\SitioInternacionControladorABM@cambiarsitiointernacion']);
	route::resource('evolucion','Internacion\EvolucionesControladorABM');

	route::resource('medicion','Mediciones\MedicionesControladorABM');

	route::resource('imagen','PictureController');

	route::resource('expediente','ExpedientePersona');
});
