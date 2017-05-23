@extends('layouts.app1')
@section('content')

<div class="panel panel-default marco_trabajo">
	@include('Errores')	

	<div class="panel-heading">
		<h3><strong>Signos Vitales para:</strong></h3>
		@include('persona.LstDatosBasicos')
	</div>
	
	<div class="panel-body">
		<div>
			<h4><a href="#" data-toggle="modal" data-target="#ModalMediciones" class="btn btn-info">+ Registrar SV</a></h4>
		</div>
		@include('mediciones.LstMediciones')
	</div>

</div>
@include ('mediciones.ModalMediciones')
@endsection