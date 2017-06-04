@extends('layouts.app1')

@section('content')

<div class="panel panel-default marco_trabajo">

	@include('Errores')

	<div class="panel-heading">
		<div class="container-fluid">			
			<h3><a href="javascript:window.history.back();" class="btn btn-warning">Atras</a>  Registro de Persona</h3>
		</div>
	</div>

	<div class="panel-body">
		<div class="container-fluid">
			{!! Form::open(['route'=>'persona.store','method'=>'POST','role'=>'form']) !!}
				
				{{-- <input type="hidden" name="codigo" value="{{ $codigo_transaccion }}" id="codigo"> --}}
				
				<div class="row">

					<div class="col-md-4">
						<h4><b>Datos personales</b></h4>										

						<div class="form-group has-error">
							<div class="input-group">
								<span class="input-group-addon">Nombre</span>
								{!! Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre(s)','onkeyup'=>'mayuscula(nombre)']) !!}
							</div>													
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Ap.Paterno</span>
								{!! Form::text('ap_paterno',null,['id'=>'ap_paterno','class'=>'form-control','placeholder'=>'A.Paterno','onkeyup'=>'mayuscula(ap_paterno)']) !!}
							</div>							
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Ap.Materno</span>
								{!! Form::text('ap_materno',null,['id'=>'ap_materno','class'=>'form-control','placeholder'=>'A.Materno','onkeyup'=>'mayuscula(ap_materno)']) !!}
							</div>							
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">F.Nacimiento</span>
								{!! Form::input('date','fecha_nacimiento',null,['id'=>'fecha_nacimiento','class'=>'form-control','placeholder'=>'dd-mm-aaaa o aaaa-mm-dd']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Documento Identidad</span>
								{!! Form::text('documento_identidad',null,['id'=>'documento_identidad','class'=>'form-control','placeholder'=>'Documento de Identidad']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Tipo de Documento</span>
								{!! Form::select('tipo_documento',$tipoDocumento,null,['id'=>'tipo_documento','class'=>'form-control','onkeyup'=>'mayuscula(tipo_seguro)']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Genero</span>
								<div class="col-md-4 col-md-offset-2">
									{!! Form::label('Masculino',null,['class'=>'control-label']) !!}
									{!! Form::radio('sexo', 'M',false, array('id'=>'M')) !!}
								</div>
								<div class="col-md-4 col-md-offset-2">
									{!! Form::label('Femenino',null,['class'=>'control-label']) !!}
									{!! Form::radio('sexo', 'F',false, array('id'=>'F')) !!}
								</div>
							</div>
												
						</div>
					</div>
<!-- Aqui fin Datos personales -->

					<div class="col-md-4">
						<h4><b>Datos contacto</b></h4>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Telefono</span>
								{!! Form::number('no_telefono',null,['id'=>'no_telefono','class'=>'form-control','placeholder'=>'Telefono']) !!}
							</div>						
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Celular</span>
								{!! Form::number('no_celular',null,['id'=>'no_celular','class'=>'form-control','placeholder'=>'Celular']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Telefono Trabajo</span>
								{!! Form::number('no_telefono_trabajo',null,['id'=>'no_telefono_trabajo','class'=>'form-control','placeholder'=>'Tel.Trabajo']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Direccion</span>
								{!! Form::text('direccion',null,['id'=>'direccion','class'=>'form-control','placeholder'=>'Direccion','onkeyup'=>'mayuscula(direccion)']) !!}
							</div>						
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">E-Mail</span>
								{!! Form::text('email',null,['id'=>'email','class'=>'form-control','placeholder'=>'E-Mail']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Residencia</span>
								{!! Form::text('ciudad_residencia',null,['id'=>'ciudad_residencia','class'=>'form-control','placeholder'=>'Ciudad de Residencia','onkeyup'=>'mayuscula(ciudad_residencia)']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Lugar de Nacimiento</span>
								{!! Form::text('lugar_nacimiento',null,['id'=>'lugar_nacimiento','class'=>'form-control','placeholder'=>'Lugar de Nacimiento','onkeyup'=>'mayuscula(lugar_nacimiento)']) !!}
							</div>
						</div>
					</div>
<!-- Aqui fin Datos contacto -->				

					<div class="col-md-4">
						<h4><b>Datos seguro</b></h4>
						
						{{-- <div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Seguro</span>
								{!! Form::select('codigo_seguro',$tipoSeguro,null,['id'=>'codigo_seguro','class'=>'form-control','onkeyup'=>'mayuscula(tipo_seguro)']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Matricula Seguro</span>
								{!! Form::text('matricula_seguro',null,['id'=>'matricula_seguro','class'=>'form-control','placeholder'=>'Matricula de Seguro']) !!}
							</div>
						</div> --}}

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Religion</span>
								{!! Form::text('religion',null,['id'=>'religion','class'=>'form-control','placeholder'=>'Religion','onkeyup'=>'mayuscula(religion)']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Notas</span>
								{!! Form::textarea('observaciones',null,['id'=>'observaciones','class'=>'form-control','placeholder'=>'Notas','onkeyup'=>'mayuscula(observaciones)']) !!}
							</div>
						</div>
					</div>
				</div>

				{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','class'=>'btn btn-info btn-sm m-t-10']) !!}

			{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection


