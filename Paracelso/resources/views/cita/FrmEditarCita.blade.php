@extends('layouts.app1')

@section('content')

<div class="panel panel-default  marco_trabajo">
	@include('Errores')
	<div class="panel-heading">
		<h3><strong>Editar Cita para:</strong></h3>
    	<h3>{{ $cita->personas->nombre }} {{ $cita->personas->ap_paterno }} {{ $cita->personas->ap_materno }}</h3>
	</div>

	<div class="panel-body">
		<div class="container-fluid">
			{!! Form::model($cita,['route'=>['cita.update',$cita->id_cita],'method'=>'PUT','role'=>'form']) !!}
				
				<div class="row">
					<div class="col-md-4">
						<label for=""><strong>Datos Registrados</strong></label>

						<label for="">Medico</label>
						<p>{{ $cita->medicos->personas->nombre }} {{ $cita->medicos->personas->ap_paterno }}</p>

						<label for="">Consultorio</label>
						<p>{{ $cita->id_consultorio }}</p>

						<label for="">Motivo</label>
						<p>{{ $cita->motivo }}</p>

						<label for="">Historia</label>
						<p>{{ $cita->historia }}</p>

						<label for="">Fecha</label>
						<p>{{ $cita->fecha->format('d-m-Y') }}</p>

						<label for="">Hora</label>
						<p>{{ $cita->hora }}</p>

					</div>

					<div class="col-md-8">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Medico</span>
								<select class="form-control" id="id_medico" name="id_medico">
								<option value="0">Seleccione un Medico</option>
				            	@foreach ($medicos as $medico)
				                    <option value="{{ $medico->id_medico }}">{{ $medico->personas->nombre }} {{ $medico->personas->ap_paterno }} {{ $medico->personas->ap_materno }}</option>
				                 @endforeach
				            	</select>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Consultorio</span>
								{!! Form::text('id_consultorio',null,['id'=>'id_consultorio','class'=>'form-control','placeholder'=>'Consultorio']) !!}
							</div>	
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Motivo</span>
								{!! Form::text('motivo',null,['id'=>'motivo','class'=>'form-control','placeholder'=>'Motivo de la Cita','onkeyup'=>'mayuscula(motivo)']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Historia</span>
								{!! Form::text('historia',null,['id'=>'historia','class'=>'form-control','placeholder'=>'Historia','onkeyup'=>'mayuscula(historia)']) !!}
							</div>
						</div>

						<div class="form-group col-md-6">
							<div class="input-group">
								<span class="input-group-addon">Fecha</span>
								{!! Form::input('date','fecha',null,['id'=>'fecha','class'=>'form-control','placeholder'=>'dd-mm-aaaa o aaaa-mm-dd']) !!}
							</div>
						</div>

						<div class="form-group col-md-6">
							<div class="input-group">
								<span class="input-group-addon">Hora</span>
								{!! Form::input('time','hora',null,['id'=>'hora','class'=>'form-control','placeholder'=>'hh:mm']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::hidden('estado','TCEP',['id'=>'estado','class'=>'form-control','placeholder'=>'estado']) !!}
						</div>

						{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-primary btn-sm m-t-10']) !!}

					</div>

				</div>
				
			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection