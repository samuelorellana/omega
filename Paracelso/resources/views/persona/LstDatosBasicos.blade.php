<div class="container-fluid">
      
	<div class="thumb" style="float: left;"><img src="" class="img-responsive" alt="S/I"></div>

	<h4> {{session('nombre_persona')}}  | <small>Edad: {{session('fecha_nacimiento')->diffForHumans(null,true)}}</small></h4>

	<h6 class="texto_thumb_paciente"><a href="#"> Editar imagen </a>  |  <a href="{{ route('persona.edit',session('id_persona')) }}"> Ver Detalles </a></h6>

</div>