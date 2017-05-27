@extends('layouts.app1')
@section('content')

<div class="container-fluid  marco_trabajo">
    <h3><strong>Crear Orden de Internacion para:</strong></h3>
    @include('persona.LstDatosBasicos')
</div>

<div class="container-fluid  marco_trabajo">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				@include('Errores')

				<div class="panel-heading">Datos requeridos</div>

				<div class="panel-body">
					{!! Form::open(['route'=>'ordenesT.store','method'=>'POST','role'=>'form']) !!}
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Tipo </span>
								{!! Form::select('tipo_transferencia',$tipoTransferencia,null,['id'=>'tipo_transferencia','class'=>'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Motivo </span>
								{!! Form::text('motivo_transferencia',null,['id'=>'motivo_transferencia','class'=>'form-control','placeholder'=>'Causa principal de transferencia']) !!}
							</div>	
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Institucion </span>
								{!! Form::text('institucion',null,['id'=>'institucion','class'=>'form-control','placeholder'=>'Hospital o Clinica al que se transfiere']) !!}
							</div>	
						</div>
						
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Diagnosticos </span>
								{!! Form::text('diagnosticos',null,['id'=>'diagnosticos','class'=>'form-control','placeholder'=>'Diagnosticos principales asignados']) !!}
							</div>	
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Notas </span>
								{!! Form::text('notas',null,['id'=>'notas','class'=>'form-control','placeholder'=>'Estado del paciente, tratamientos, medidas, etc']) !!}
							</div>	
						</div>
						
						<div class="form-group">
							{!! Form::hidden('id_origen',$id_origen,['id'=>'id_origen','class'=>'form-control','placeholder'=>'estado']) !!}
						</div>

						<div class="form-group">
							{!! Form::hidden('origen',$origen,['id'=>'origen','class'=>'form-control','placeholder'=>'estado']) !!}
						</div>

						<div class="form-group">
							{!! Form::hidden('id_medico',$id_medico,['id'=>'id_medico','class'=>'form-control','placeholder'=>'estado']) !!}
						</div>

						<div class="form-group">
							{!! Form::hidden('codigo_transaccion',$codigo_transaccion,['id'=>'codigo_transaccion','class'=>'form-control','placeholder'=>'estado']) !!}
						</div>

						<div class="form-group">
							{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'estado']) !!}
						</div>
						
						{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-primary btn-sm m-t-10']) !!}
						
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection