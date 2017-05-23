@extends('layouts.app1')

@section('content')

<div class="container">
	<h3>Crear imagen</h3>
</div>
<div class="container">
	{!! Form::open(['route'=>'imagen.store','method'=>'POST','files'=>true,'role'=>'form']) !!}
		<div>
			{!! Form::label('nombre','Nombre:') !!}
			{!! Form::text('nombre') !!}
		</div>
		<div>
			{!! Form::label('Elija una imagen') !!}
			{!! Form::file('pic') !!}
		</div>
		<div>
			{!! Form::submit('Guardar') !!}
		</div>
	{!! Form::close() !!}
</div>
@endsection