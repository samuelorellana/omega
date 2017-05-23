@extends('layouts.app1')

@section('content')

<div class="container">
	<h3>Imagenes</h3>
	<a href="{{ route('imagen.create') }}" class="btn btn-primary">Nueva</a>
</div>

<div class="container">
	<table border="1">
		<tr>
			<td>Id</td>
			<td>Nombre</td>
			<td>Imagen</td>
		</tr>
		@foreach($imagenes as $imagen)
			<tr>
				<td>{{ $imagen->id }}</td>
				<td>{{ $imagen->nombre }}</td>
				<td> <img src="pic/{{ $imagen->id }}"></td>
			</tr>
		@endforeach
	</table>
</div>

@endsection