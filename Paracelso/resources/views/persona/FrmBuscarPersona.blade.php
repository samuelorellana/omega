@extends('layouts.app1')

@section('content')
<div class="panel panel-default marco_trabajo">
	@include('Errores')
	<div class="panel-heading">
		<div class="container-fluid">
			<h3>
				Busqueda de Pacientes
				{{-- <span style="float: right; font-weight: x-small;">Cod: {{ $codigo_transaccion }}</span> --}}
			</h3>
		</div>
		<div>
			<a href="javascript:window.history.back();" class="btn btn-warning">Atras</a>
			<a href="{{ route('persona.create') }}" class="btn btn-primary">+ Nuevo Registro</a>
		</div>
	</div>
	<div class="panel-body">

		<div class="container-fluid">
			{!! Form::open() !!}

			{{-- <input type="hidden" name="codigo" value="{{ $codigo_transaccion }}" id="codigo"> --}}

			<div class="row">
				<div class="col-md-3 col-sm-3">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Nombre</span>
							{!! Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre(s)','onkeyup'=>'mayuscula(nombre)']) !!}
						</div>						
					</div>
				</div>
				<div class="col-md-3 col-sm-3">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Ap Paterno</span>
							{!! Form::text('ap_paterno',null,['id'=>'ap_paterno','class'=>'form-control','placeholder'=>'A.Paterno','onkeyup'=>'mayuscula(ap_paterno)']) !!}
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-3">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Ap Materno</span>
							{!! Form::text('ap_materno',null,['id'=>'ap_materno','class'=>'form-control','placeholder'=>'A.Materno','onkeyup'=>'mayuscula(ap_materno)']) !!}
						</div>
					</div>
				</div>
				<div class="col-md-3">
	                <button id="botonBuscarPersonas" type="button" class="btn btn-primary"> Buscar 
	                </button>
	            </div>
			</div>
			{!! Form::close() !!}
			
			<div class="container-fluid" id="resultadobusqueda"></div>

		</div>		
	</div>
</div>
@endsection

@section('javascript')
	<script type="text/javascript" src="{{asset('js/BusquedaPersona.js')}}"></script>
@stop