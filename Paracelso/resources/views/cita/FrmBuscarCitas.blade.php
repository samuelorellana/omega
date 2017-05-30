@extends('layouts.app1')

@section('content')
<div class="panel panel-default marco_trabajo">
	@include('Errores')

	<div class="panel-heading">
		<div class="container-fluid">
			<h1>Agenda de Citas</h1>
		</div>
		<div>
		<a href="{{ route('cita.create') }}" class="btn btn-primary">Nueva Cita</a>
		<a href="{{ route('Calendario') }}" class="btn btn-info">Vista Calendario</a>
		</div>
	</div>

	<div class="panel-body">
		<div class="container-fluid">
			{!!Form::open() !!}

				<div class="form-group col-md-3">
					<div class="input-group">
						<span class="input-group-addon">Fecha</span>
						{!! Form::input('date','fecha',null,['id'=>'fecha','class'=>'form-control','placeholder'=>'dd-mm-aaaa o aaaa-mm-dd']) !!}
					</div>
				</div>

				<div class="form-group col-md-3">
					<div class="input-group">
						<span class="input-group-addon">Hora</span>
						{!! Form::input('time','hora',null,['id'=>'hora','class'=>'form-control','placeholder'=>'hh:mm']) !!}
					</div>
				</div>

				<div class="form-group col-md-3">
					<div class="input-group">
						<span class="input-group-addon">Medico</span>
						{!! Form::select('id_medico',$medicos,null,['id'=>'id_medico','class'=>'form-control']) !!}
					</div>
				</div>

				{{-- <div class="form-group col-md-3">
					<div class="input-group">
						<span class="input-group-addon">Medico</span>
						<select class="form-control" id="id_medico" name="id_medico">
						<option value="0">Seleccione un Medico</option>
		            	@foreach ($medicos as $medico)
		                    <option value="{{ $medico->id_medico }}">{{ $medico->personas->nombre }} {{ $medico->personas->ap_paterno }} {{ $medico->personas->ap_materno }}</option>
		                @endforeach
		                </select>
					</div>
				</div> --}}

				<div class="col-md-3">
	                <button id="botonBuscarCitas" type="button" class="btn btn-primary"> Buscar 
	                </button>
	            </div>

			{!! Form::close() !!}

		</div>
		<div class="container-fluid" id="resultadoBusquedaCita">
        	@include('cita.LstCitas')
        	
    	</div>
	</div>
</div>

@endsection

@section('javascript')
	<script type="text/javascript" src="{{asset('js/BusquedaCita.js')}}"></script>
@stop