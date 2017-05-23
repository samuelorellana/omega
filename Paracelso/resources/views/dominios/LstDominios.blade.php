@extends('layouts.app1')

@section('content')
<div class="panel panel-default marco_trabajo">
	<div class="panel-heading">
		<h1>Dominios</h1>
	</div>
	<div class="panel-body">

		@include('dominios.TablaLista')

	</div>
	<div class="panel-footer">
		<button class="btn btn-info navbar-btn" type="button" onclick="document.location.href='{{ route('dominios.create') }}'">Registrar Nuevo</button>
	</div>
</div>
@endsection