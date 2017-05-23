@extends('layouts.app1')

@section('content')

<div class="panel panel-default marco_trabajo">
	<div class="panel-heading">
		<div class="container-fluid">
			<h1>Datos de Usuario</h1>
		</div>
	</div>
	<div class="panel-body">
		<div class="container col-md-4">
			<p><strong>Datos Usuario</strong></p>
			<p>{{ $usuario->name }}</p>
			<p>{{ $usuario->email }}</p>
			<p>{{ $usuario->institucion->nombre_institucion }}</p>
			<p><small>Por seguridad el passwor no se muestra...</small></p>
		</div>
		<div class="container col-md-4">
			<p><strong>Datos Personales</strong></p>
			@foreach($usuario->personas as $persona)
				<p>{{ $persona->nombre }}</p>
				<p>{{ $persona->ap_paterno }}</p>
				<p>{{ $persona->ap_materno }}</p>
				<p>{{ $persona->fecha_nacimiento }}</p>
				<p>{{ $persona->documento_identidad }}</p>
				<p>{{ $persona->no_telefono }}</p>
				<p>{{ $persona->no_celular }}</p>
				<p>{{ $persona->direccion }}</p>
				<a href="{{ route('persona.edit',$persona->id_persona) }}">Editar</a>
			@endforeach
			
		</div>
		<div class="container col-md-4">
			<p><strong>Datos de Rol</strong></p>
			@foreach($usuario->roles as $rol)
				<p>{{ $rol->nombre }}</p>
				<p>{{ $rol->descripcion }}</p>
				<p>{{ $rol->nivel }}</p>
			@endforeach
		</div>
	</div>
</div>

@endsection