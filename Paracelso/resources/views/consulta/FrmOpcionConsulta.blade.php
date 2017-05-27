@extends('layouts.app1')

@section('content')
<!-- Titulo de Menu -->
<div class="container marco_trabajo">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Ya existe(n) Consulta(s) en esta fecha [ {{ $fecha }} ]</h3>
				
				@include('consulta.TablaConsultas')
				
			<h3>Desea...</h3>
		</div>
		<div class="panel-body">
			<a href="{{ route('consulta.create') }}" class="btn btn-success">Crear una Nueva Consulta?</a>
		</div>
	</div>
</div>

<!-- Fin de Titulo -->
@endsection