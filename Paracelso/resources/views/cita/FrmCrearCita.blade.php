@extends('layouts.app1')
@section('content')

<div class="container-fluid  marco_trabajo">
    <h3><strong>Crear Cita para:</strong></h3>
    @include('persona.LstDatosBasicos')
</div>

<div class="container-fluid  marco_trabajo">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				@include('Errores')

				<div class="panel-heading">Datos requeridos</div>

				<div class="panel-body">
					{!! Form::open(['route'=>'cita.store','method'=>'POST','role'=>'form']) !!}
						
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Medico</span>
								{!! Form::select('id_medico',$medicos,null,['id'=>'id_medico','class'=>'form-control']) !!}
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
						
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection