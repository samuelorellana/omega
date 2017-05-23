@extends('layouts.app1')

@section('content')
<div class="panel panel-default marco_trabajo">

	@include('Errores')
	
	<div class="panel-heading">
		<h1>Crear Nuevo Dominio</h1>
	</div>
	<div class="panel-body">
		{!! Form::open(['route'=>'dominios.store','method'=>'POST']) !!}

			<div class="form-group">
				{!! Form::label('Nombre del Dominio') !!}
				{!! Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del Dominio','onkeyup'=>'mayuscula(nombre)']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('Codigo del Dominio') !!}
				{!! Form::text('codigo_dominio',null,['id'=>'codigo_dominio','class'=>'form-control','placeholder'=>'Codigo del Dominio','onkeyup'=>'mayuscula(codigo_dominio)']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('Descripcion del Dominio') !!}
				{!! Form::text('descripcion',null,['id'=>'descripcion','class'=>'form-control','placeholder'=>'Descripcion del Dominio','onkeyup'=>'mayuscula(descripcion)']) !!}				
			</div>

			<div class="form-group">
				{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
			</div>

			{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-info btn-sm m-t-10']) !!}
		
		{!! Form::close() !!}
		
	</div>
	<div class="panel-footer">
		
	</div>
</div>
@endsection