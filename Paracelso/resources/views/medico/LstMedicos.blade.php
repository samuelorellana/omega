@extends('layouts.app1')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h1>Dominios</h1>
	</div>
	<div class="panel-body">

		@include('medico.TablaLista')

	</div>
	<div class="panel-footer">
		<button class="btn btn-info navbar-btn" type="button" onclick="document.location.href='{{ route('medico.create') }}'">Registrar Nuevo</button>
	</div>
</div>
@endsection