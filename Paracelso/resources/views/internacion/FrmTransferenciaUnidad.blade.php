@extends('layouts.app1')

@section('content')
<div class="panel panel-default marco_trabajo">
	@include('Errores')

	<div class="panel-heading">
		<h3><a href="javascript:window.history.back();" class="btn btn-warning">Atras</a> <strong>Se realizara la transferecia del Paciente:</strong></h3>
		@include('persona.LstDatosBasicos')
	</div>

	<div class="panel-body">
	
		@include('internacion.SitioInternacion')

	</div>
</div>
@endsection