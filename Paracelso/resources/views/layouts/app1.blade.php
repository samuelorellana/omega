<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="Plataforma de asistencia para médicos y especialistas que apoya en la atención de pacientes"/>
    <meta name="author" content="">

    <title>Paracelso</title>

    <!-- Bootstrap Core CSS -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    {!! Html::style('css/bootstrap.min.css') !!}
    @yield('calendario')
    {!! Html::style('css/global.css') !!}
    <link rel="shortcut icon" href="{{asset('imagenes/favicon/favicon.ico')}}">
    
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}" id="menu-toggle">
                    {{ Auth::user()->institucion->nombre_institucion }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    {{-- <li><a href="{{ url('/home') }}">Inicio</a></li> --}}
                    {{-- @if (! Auth::guest())
                        
                        <li><a href="{{ route('persona.show','show') }}">Personas</a></li>
                        <li><a href="{{ route('cita.index') }}">Citas</a></li>
                        <li><a href="{{ route('imagen.index') }}">Imagen</a></li>
                        
                    @endif --}}
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> 
                            @foreach(Auth::user()->personas as $persona)
                                <strong>{{ $persona->nombre }} {{ $persona->ap_paterno }}</strong>
                            @endforeach
                            [ {{ Auth::user()->name }} ] <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('medico.index') }}">Medicos</a></li>
                                <li><a href="{{ route('dominios.index') }}">Dominios</a></li>
                                <li><a href="{{ route('seguros.index') }}">Seguros</a></li>
                                <li><a href="{{ url('usuario') }}">Gestion de Usuarios</a></li>

                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i><strong>Cerrar Sesion</strong></a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
</nav>


<!--  Navegacion Lateral -->
<div class="container">
    <div class="row">
      <div id="menu_lateral" class="col-md-1">
        <ul class="nav nav-pills nav-stacked" role="menu">
          <li role="presentation"> <a href="{{ url('/cita') }}" class="textomenu">
            <div class="puntero"> <span class="glyphicon fui-calendar icono_menu"></span>
              <p class="textomenu">Ag. Citas</p>
            </div>
            </a>
          </li>

          <li role="presentation"> <a href="{{ url('/persona/show') }}" class="textomenu">
            <div class="puntero"> <span class="glyphicon fui-user icono_menu"></span>
              <p class="textomenu">Pacientes</p>
            </div>
            </a></li>
          <li role="presentation"> <a href="#reporte" class="textomenu">
            <div class="puntero"> <span class="glyphicon fui-calendar-solid icono_menu"></span>
              <p class="textomenu">Reportes</p>
            </div>
            </a></li>
        </ul>
      </div>
    </div>
</div>
<!--  Fin Navegacion Lateral -->

<!-- Aqui va el mensaje de acciones -->
@include('Acciones')
<!-- Page Content -->
@yield('content')
<!-- /#page-content-wrapper -->

<!-- Definicion de Footer Paracelso -->
<footer>
<div class="footer"> 
  <div class="container">
      <p>
      <small><span class="fui-location"> </span> Edif. CES, Of. #204, Obrajes calle 6, La Paz - Bolivia    </small>
      <small><span class="fui-chat"> </span> (+591) 720 00301 / (+591) 673 13333    </small>
      <small><span class="fui-mail"> </span>gerencia@timnetbo.com / soporte@timnetbo.com</small>
      </p>
  </div>
 </div>
 
 <!-- Se deden definir los iconos sociales a la derecha y derechos reservados por debajo -->
</footer>
<!-- Final de Footer -->


        


    <!-- jQuery -->
    {!! Html::script('js/jquery.js') !!}

    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('js/bootstrap.min.js') !!}

    <!-- utilitario para Mayusculas -->
    {!! Html::script('js/utilitarios.js') !!}

    <!-- Fullcalendar Js -->
    @yield('calendarioJS')
    
    {{-- <script>
        function abrirVentana(url) {
            window.open(url, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, fullscreen=yes");
        }
    </script> --}}
    
    @yield('javascript')


</body>

</html>