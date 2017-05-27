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
					{!! Form::open(['route'=>'ordenesI.store','method'=>'POST','role'=>'form']) !!}
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Tipo </span>
								{!! Form::select('tipo_internacion',$tipoInternacion,null,['id'=>'tipo_internacion','class'=>'form-control']) !!}
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Lugar </span>
								{!! Form::text('lugar_internacion',null,['id'=>'lugar_internacion','class'=>'form-control','placeholder'=>'Lugar de Internacion']) !!}
							</div>	
						</div>
						
						<div class="form-group col-md-6">
							<div class="input-group">
								<span class="input-group-addon">Fecha</span>
								{!! Form::input('date','fecha_internacion',$fecha->toDateString(),['id'=>'fecha_internacion','class'=>'form-control','placeholder'=>'dd-mm-aaaa o aaaa-mm-dd']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::hidden('id_consulta',$id_consulta,['id'=>'id_consulta','class'=>'form-control','placeholder'=>'estado']) !!}
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