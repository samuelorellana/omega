@extends('layouts.app1')

@section('content')
<div class="container-fluid marco_trabajo">
   <h3>Finalizar Consulta De:</h3>
   @include('persona.LstDatosBasicos')
</div>

<div class="container-fluid marco_trabajo">

	<div class="cuadro_menu_paciente col-md-2 col-sm-4"> <a href="{{ route('redireccion',[$id_consulta,$id_medico,500]) }}">
        <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/enfermera_w.png') }}" alt="Agendar Cita"></div>
        <h4 class="titulo_menu">Agendar Cita</h4>
        <div class="texto_menu"><p><small>Crear cita para nueva consulta</small></p></div>
        </a>
    </div>

    <!-- Boton Historia Clinica -->
    <div class="cuadro_menu_paciente col-md-2 col-sm-4"> <a href="{{ route('ordeninternacion',[$id_consulta,$id_medico,400]) }}">
        <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/quirofano_w.png') }}" alt="Internacion"></div>
        <h4 class="titulo_menu">Internacion</h4>
        <div class="texto_menu"><p><small>Crear nota de internacion</small></p></div>
        </a>
    </div>

    <div class="cuadro_menu_paciente col-md-2 col-sm-4"> <a href="{{ route('ordentransferencia',[$id_consulta,$id_medico,800]) }}">
        <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/expediente_w.png') }}" alt="Transferencia"></div>
        <h4 class="titulo_menu">Transferencia</h4>
        <div class="texto_menu"><p><small>Crear nota de transferencia</small></p></div>
        </a>
    </div>

    <!-- Boton Historia Clinica -->
    <div class="cuadro_menu_paciente col-md-2 col-sm-4"> <a href="{{ url('/cita') }}">
        <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/estadisticas_w.png') }}" alt="Finalizar"></div>
        <h4 class="titulo_menu">Finalizar</h4>
        <div class="texto_menu"><p><small>Finalizar la consulta sin acciones</small></p></div>
        </a>
    </div>

</div>
@endsection