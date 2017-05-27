@extends('layouts.app1')
@section('content')

<div class="container-fluid  marco_trabajo">
    <h3><a href="javascript:window.history.back();" class="btn btn-warning">Atras</a> <strong>Crear Internacion para:</strong></h3>
    @include('persona.LstDatosBasicos')
</div>

<div class="container-fluid  marco_trabajo">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				@include('Errores')

				<div class="panel-heading">Datos requeridos</div>

				<div class="panel-body">

					<div class="row"><small>Fecha y Hora de Internacion : {{ $fecha->toDateTimeString() }}</small></div>

					{!! Form::open(['route'=>'internacion.store','method'=>'POST','role'=>'form']) !!}
						<div class="row">
						<div class="form-group col-sm-6 col-md-6">
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

						<div class="form-group col-sm-6 col-md-6">
							<div class="input-group">
								<span class="input-group-addon">Tipo</span>
								{!! Form::select('tipo_internacion',$tipoInternacion,null,['id'=>'tipo_internacion','class'=>'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::hidden('id_orden_internacion',0,['id'=>'id_orden_internacion','class'=>'form-control','placeholder'=>'estado']) !!}
						</div>

						<div class="form-group">
							{!! Form::hidden('fecha_hora',$fecha,['id'=>'fecha_hora','class'=>'form-control','placeholder'=>'estado']) !!}
						</div>	

						<div class="form-group">
							{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'estado']) !!}
						</div>
						
						{!! Form::submit('Continuar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Continuar</span>','class'=>'btn btn-primary btn-sm m-t-10']) !!}
						</div>						
					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>

@endsection