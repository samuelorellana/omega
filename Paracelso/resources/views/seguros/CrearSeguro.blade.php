@extends('layouts.app1')

@section('content')
<div class="panel panel-default marco_trabajo">

	@include('Errores')
	
	<div class="panel-heading">
		<h1>Crear Nuevo Seguro</h1>
	</div>
	<div class="panel-body">
		{!! Form::open(['route'=>'seguros.store','method'=>'POST']) !!}
			
			{{-- aqui debe ir un select.... --}}
			<div class="form-group">
				{!! Form::label('ELija un tipo de seguro') !!}
				{!! Form::select('tipo_seguro',$tipoSeguro,null,['id'=>'tipo_seguro','class'=>'form-control','onkeyup'=>'mayuscula(tipo_seguro)']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('Nombre del seguro') !!}
				{!! Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre del seguro','onkeyup'=>'mayuscula(nombre)']) !!}
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