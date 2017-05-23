@extends('layouts.app1')

@section('content')

<div class="container-fluid marco_trabajo">
   <h3>Menu de Trabajo</h3>
   @include('persona.LstDatosBasicos')
</div>



<div class="container-fluid marco_trabajo">
	<div class="cuadro_menu_paciente col-md-2 col-sm-4"> <a href="{{ route('medicion.show',session('id_persona')) }}">
        <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/gabinete_w.png') }}" alt="Signos Vitales"></div>
        <h3 class="titulo_menu">Signos Vitales</h3>
        <div class="texto_menu"><p><small>Mediciones importantes del Paciente</small></p></div>
        </a>
    </div>

    <!-- Boton Historia Clinica -->
    <div class="cuadro_menu_paciente col-md-2 col-sm-4"> <a href="{{ route('historia.show',session('id_persona')) }}"> {{--  --}}
        <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/expediente_w.png') }}" alt="Historia"></div>
        <h3 class="titulo_menu">Historia Clinica</h3>
        <div class="texto_menu"><p><small>Antecedentes del Paciente</small></p></div>
        </a>
    </div>

    <!-- Boton Consulta -->
    <div class="cuadro_menu_paciente col-md-2 col-sm-4"> <a href="{{ route('consulta.show',session('id_persona')) }}"> {{--  --}}
        <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/estetoscopio_w.png') }}" alt="Consulta"></div>
        <h3 class="titulo_menu">Consulta</h3>
        <div class="texto_menu"><p><small>Administracion de Consultas</small></p></div>
        </a>
    </div>

    <!-- Boton Laboratorio -->
    {{-- <div class="cuadro_menu_paciente col-md-2 col-sm-4"> <a href="#"> --}} {{-- {{ route('ordenesL.show',session('id_paciente')) }} --}}
        {{-- <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/microscopio_w.png') }}" alt="Laboratorio"></div>
        <h3 class="titulo_menu">Laboratorio</h3>
        <div class="texto_menu"><p><small>Resultados de Laboratorios</small></p></div>
        </a>
    </div> --}}
    
    <!-- Boton Gabinete -->
    {{-- <div class="cuadro_menu_paciente col-md-2 col-sm-4"> <a href="#"> --}} {{-- {{ route('ordenesG.show',session('id_paciente')) }} --}}
        {{-- <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/enfermera_w.png') }}" alt="Gabinete"></div>
        <h3 class="titulo_menu">Gabinete</h3>
        <div class="texto_menu"><p><small>Administracion de Imagenología</small></p></div>
        </a>
    </div> --}}
    
    <!-- Boton Quirofano -->
    {{-- <div class="cuadro_menu_paciente col-md-2 col-sm-4"> <a href="#">
        <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/quirofano_w.png') }}" alt="Quirofano"></div>
        <h3 class="titulo_menu">Quirofano</h3>
        <div class="texto_menu"><p><small>Programacion de Quirofano</small></p></div>
        </a>
    </div> --}}
    
    {{-- <div class="cuadro_menu_paciente col-md-2 col-sm-4"> <a href="#">
        <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/estadisticas_w.png') }}" alt="Otros"></div>
        <h3 class="titulo_menu">Estadisticas</h3>
        <div class="texto_menu"><p><small>Estasdisticas referidas al paciente</small></p></div>
        </a>
    </div> --}}
</div>

@endsection