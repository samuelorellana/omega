@extends('layouts.app1')

@section('content')

<div class="container-fluid marco_trabajo">
   <h3>Menu de Trabajo para Usuarios</h3>
</div>

<div class="container-fluid marco_trabajo">
	<div class="cuadro_menu_paciente col-md-2 col-sm-4"> <a href="{{ route('usuario.show',Auth::user()->id) }}"> {{-- {{ route('medicion.show',session('id_persona')) }} --}}
        <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/gabinete_w.png') }}" alt="Perfil"></div>
        <h3 class="titulo_menu">Perfil</h3>
        <div class="texto_menu"><p><small>Datos de Usuario Actual</small></p></div>
        </a>
    </div>

    <!-- Boton Historia Clinica -->
    <div class="cuadro_menu_paciente col-md-2 col-sm-4"> <a href="#"> {{-- {{ route('historia.show',session('id_paciente')) }} --}}
        <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/expediente_w.png') }}" alt="Lista"></div>
        <h3 class="titulo_menu">Lista</h3>
        <div class="texto_menu"><p><small>Lista de Usuarios</small></p></div>
        </a>
    </div>

    <!-- Boton Consulta -->
    <div class="cuadro_menu_paciente col-md-2 col-sm-4"> <a href="{{ route('usuario.create') }}"> {{-- {{ route('consulta.show',session('id_paciente')) }} --}}
        <div class="imagen_menu"> <img class="img-responsive" src="{{ asset ('../imagenes/menu/estetoscopio_w.png') }}" alt="Nuevo"></div>
        <h3 class="titulo_menu">Nuevo</h3>
        <div class="texto_menu"><p><small>Registro de Usuario Nuevo</small></p></div>
        </a>
    </div>

</div>

@endsection