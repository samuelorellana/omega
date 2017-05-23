<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Plataforma de asistencia para médicos y especialistas que apoya en la atención de pacientes"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TiMNet</title>

    
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/global.css') !!}
    <link rel="shortcut icon" href="{{asset('imagenes/favicon/favicon.ico')}}">
    
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
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
                <a class="navbar-brand" href="{{ url('/') }}">
                    TiMNet Bolivia
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    {{-- <li><a href="{{ url('/home') }}">Home</a></li> --}}
                    {{-- <li><a href="{{ url('pstsolucion') }}">Soluciones</a></li>
                    <li><a href="{{ url('pstempresa') }}">Empresa</a></li>
                    <li><a href="{{ url('pstayuda') }}">Ayuda</a></li> --}}
                </ul>
 
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="#" onclick="abrirVentana('/login')">Ingresar</a></li>
                        <li><a href="{{ url('/register') }}">Registrar</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
    
    <!-- Definicion de Footer Paracelso -->
    <footer>
      <div class="footer" style="float:left; padding-top:15px;"> 
        <div class="container">
            <p><span class="fui-location"> </span> Edif. CES, Of. #204, Obraje calle 6, La Paz - Bolivia</p>
            <p><span class="fui-chat"> </span> (+591) 720 00301 / (+591) 673 13333</p>
            <p><span class="fui-mail"> </span>gerencia@timnetbo.com / soporte@timnetbo.com</p>
        </div>
       </div>
       
       <!-- Se deden definir los iconos sociales a la derecha y derechos reservados por debajo -->
   </footer>
   <!-- Final de Footer -->

    <!-- JavaScripts -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> --}}
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <!-- jQuery -->
    {!! Html::script('js/jquery.js') !!}

    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('js/bootstrap.min.js') !!}

    <script>
        function abrirVentana(url) {
            window.open(url, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, fullscreen=yes");
        }
    </script>

</body>
</html>
