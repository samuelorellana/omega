@extends('layouts.app1')
@section('content')

<div class="container marco_trabajo">
	<div class="panel panel-default">
		<div class="panel-heading">

			<h3><strong>Cancelar Cita para:</strong></h3>
	    	<h3>Paciente: {{ $cita->personas->nombre }} {{ $cita->personas->ap_paterno }} {{ $cita->personas->ap_materno }}</h3>
	    	<h3>Fecha: {{ $cita->fecha->format('l jS \\of F Y') }}</h3>
	    	<h3>Hora: {{ $cita->hora }}</h3>
			<h3><strong>Desea...</strong></h3>
		</div>
		<div class="panel-body">
			<a href="{{ route('ConfirmarC',$cita->id_cita) }}" class="btn btn-danger">Confirmar Cancelacion</a>
			<a href="{{ route('cita.index') }}" class="btn btn-success">Regresar a la Agenda</a>
		</div>
	</div>
</div>

@endsection