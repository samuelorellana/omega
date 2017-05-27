@extends('layouts.app1')

@section('content')
<div class="panel panel-default marco_trabajo">
	@include('Errores')

	<div class="panel-heading">
		<h3><a href="javascript:window.history.back();" class="btn btn-warning">Atras</a> <strong>Crear Nota de Evolucion para:</strong></h3>
		@include('persona.LstDatosBasicos')
	</div>

	<div class="panel-body">
		<div class="row container-fluid">
			<div><span style="float: right;"><small>Fecha y Hora de Evolucion : {{ $fecha->toDateTimeString() }}</small></span> <h4>Unidad - Piso - Cama</h4> </div>
			
			{!! Form::open(['id'=>'formSitioI']) !!}
				{{-- <div class="row"> --}}
					<div class="form-group">
						{!! Form::hidden('id_internacion',$id_internacion,['id'=>'id_internacion','class'=>'form-control','placeholder'=>'Estado']) !!}
					</div>
					<div class="form-group">
						{!! Form::hidden('id_medico',$id_medico,['id'=>'id_medico','class'=>'form-control','placeholder'=>'Estado']) !!}
					</div>
					
					<div class="form-group col-sm-4 col-md-4">
						<div class="input-group">
							<span class="input-group-addon">Unidad</span>
							{!! Form::select('tipo_unidad',$tipoUnidad,null,['id'=>'tipo_unidad','class'=>'form-control']) !!}
						</div>
					</div>

					<div class="form-group col-sm-4 col-md-4">
				    	<div class="input-group">
				            <span class="input-group-addon">Piso</span>
							{!! Form::text('piso',null,['id'=>'piso','class'=>'form-control','placeholder'=>'Piso','onkeyup'=>'mayuscula(piso)']) !!}
						</div>
					</div>

					<div class="form-group col-sm-4 col-md-4">
				    	<div class="input-group">
				            <span class="input-group-addon">Cama</span>
							{!! Form::text('cama',null,['id'=>'cama','class'=>'form-control','placeholder'=>'Cama','onkeyup'=>'mayuscula(cama)']) !!}
						</div>
					</div>

					<div class="form-group">
						{!! Form::hidden('fecha_hora',$fecha,['id'=>'fecha_hora','class'=>'form-control','placeholder'=>'fecha']) !!}
					</div>

					<div class="form-group">
						{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
					</div>

					<div class="form-group col-sm-10 col-md-10">
				    	<div class="input-group">
				            <span class="input-group-addon">Notas</span>
							{!! Form::text('notas',null,['id'=>'notas','class'=>'form-control','placeholder'=>'Notas adicionales','onkeyup'=>'mayuscula(notas)']) !!}
						</div>
					</div>					

					<div class="form-group col-sm-2 col-md-2">
						{!! link_to('#','Guardar',['id'=>'guardarSitio','class'=>'btn btn-primary']) !!}
					</div>

			{!! Form::close() !!}
		</div>

		<div class="row container-fluid">
			<h4>Evolucion</h4>
			<div class="panel panel-default disabledTab" id="pnlEvolucion">
				<div class="panel-body">
					{!! Form::open(['id'=>'formEvolucion']) !!}
						<div class="form-group">
							{!! Form::hidden('id_internacion',$id_internacion,['id'=>'id_internacion','class'=>'form-control','placeholder'=>'Estado']) !!}
						</div>
													
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
									<span class="input-group-addon">Tipo Nota</span>
									{!! Form::select('tipo_evolucion',$tipoEvolucion,null,['id'=>'tipo_evolucion','class'=>'form-control']) !!}
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="form-group col-sm-3 col-md-3">
						    	<div class="input-group">
						            <span class="input-group-addon">Peso</span>
									{!! Form::text('peso',null,['id'=>'peso','class'=>'form-control','placeholder'=>'Peso','onkeyup'=>'mayuscula(motivo_consulta)']) !!}
								</div>
							</div>

							<div class="form-group col-sm-3 col-md-3">
						    	<div class="input-group">
						            <span class="input-group-addon">Talla</span>
									{!! Form::text('talla',null,['id'=>'talla','class'=>'form-control','placeholder'=>'Talla','onkeyup'=>'mayuscula(historia)']) !!}
								</div>
							</div>

							<div class="form-group col-sm-3 col-md-3">
						    	<div class="input-group">
						            <span class="input-group-addon">Glasgow</span>
									{!! Form::text('glasgow',null,['id'=>'glasgow','class'=>'form-control','placeholder'=>'Glasgow','onkeyup'=>'mayuscula(motivo_consulta)']) !!}
								</div>
							</div>

							<div class="form-group col-sm-3 col-md-3">
						    	<div class="input-group">
						            <span class="input-group-addon">Temp.</span>
									{!! Form::text('temperatura',null,['id'=>'temperatura','class'=>'form-control','placeholder'=>'Temperatura','onkeyup'=>'mayuscula(temperatura)']) !!}
								</div>
							</div>

							<div class="form-group col-sm-3 col-md-3">
						    	<div class="input-group">
						            <span class="input-group-addon">FC</span>
									{!! Form::text('frecuencia_cardiaca',null,['id'=>'frecuencia_cardiaca','class'=>'form-control','placeholder'=>'FC','onkeyup'=>'mayuscula(frecuencia_cardiaca)']) !!}
								</div>
							</div>

							<div class="form-group col-sm-3 col-md-3">
						    	<div class="input-group">
						            <span class="input-group-addon">FR</span>
									{!! Form::text('frecuencia_respiratoria',null,['id'=>'frecuencia_respiratoria','class'=>'form-control','placeholder'=>'FR','onkeyup'=>'mayuscula(frecuencia_respiratoria)']) !!}
								</div>
							</div>

							<div class="form-group col-sm-3 col-md-3">
						    	<div class="input-group">
						            <span class="input-group-addon">PAS</span>
									{!! Form::text('presion_sistolica',null,['id'=>'presion_sistolica','class'=>'form-control','placeholder'=>'PAS','onkeyup'=>'mayuscula(presion_sistolica)']) !!}
								</div>
							</div>

							<div class="form-group col-sm-3 col-md-3">
						    	<div class="input-group">
						            <span class="input-group-addon">PAD</span>
									{!! Form::text('presion_diastolica',null,['id'=>'presion_diastolica','class'=>'form-control','placeholder'=>'PAD','onkeyup'=>'mayuscula(presion_diastolica)']) !!}
								</div>
							</div>

							<div class="form-group col-sm-12 col-md-12">
						    	<div class="input-group">
						            <span class="input-group-addon">Subjetivo</span>
									{!! Form::text('subjetivo',null,['id'=>'subjetivo','class'=>'form-control','placeholder'=>'Evaluacion subjetiva','onkeyup'=>'mayuscula(subjetivo)']) !!}
								</div>
							</div>

							<div class="form-group col-sm-12 col-md-12">
						    	<div class="input-group">
						            <span class="input-group-addon">Objetivo</span>
									{!! Form::text('objetivo',null,['id'=>'objetivo','class'=>'form-control','placeholder'=>'Evaluacion objetiva','onkeyup'=>'mayuscula(objetivo)']) !!}
								</div>
							</div>

							<div class="form-group col-sm-12 col-md-12">
						    	<div class="input-group">
						            <span class="input-group-addon">Plan</span>
									{!! Form::text('plan',null,['id'=>'plan','class'=>'form-control','placeholder'=>'Plan para el paciente','onkeyup'=>'mayuscula(plan)']) !!}
								</div>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-sm-6 col-md-6">
								<div class="input-group">
									<span class="input-group-addon">Tipo de Conducta a Seguir</span>
									{!! Form::select('tipo_conducta',$tipoConducta,null,['id'=>'tipo_conducta','class'=>'form-control']) !!}
								</div>
							</div>

							<div class="form-group">
								{!! Form::hidden('fecha_hora',$fecha,['id'=>'fecha_hora','class'=>'form-control','placeholder'=>'fecha']) !!}
							</div>

							<div class="form-group">
								{!! Form::hidden('estadoE','AC',['id'=>'estadoE','class'=>'form-control','placeholder'=>'Estado']) !!}
							</div>

							<div class="form-group col-sm-6 col-md-6">
								{!! link_to('#','Guardar',['id'=>'guardarEvolucion','class'=>'btn btn-primary']) !!}
							</div>
						</div>		
						
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
	//------------------------Sitio Internacion
	$('#guardarSitio').on('click',function(e){
		var id_internacion = $('#id_internacion').val();
		var id_medico = $('#id_medico').val();		
		var tipo_unidad = $('#tipo_unidad').val();
		var piso = $('#piso').val();
		var cama = $('#cama').val();
		var notas = $('#notas').val();
		var fecha_hora = $('#fecha_hora').val();
		var estado = $('#estado').val();
		var token = $("input[name=_token]").val();

		var url = "{{ route('sitiointernacion.store') }}";

		var dataString = {id_internacion:id_internacion, id_medico:id_medico, tipo_unidad:tipo_unidad, piso:piso, cama:cama, notas:notas, fecha_hora:fecha_hora, estado:estado, token:token};

		$.ajax({
			url:url,
		  	headers:{'X-CSRF-TOKEN':token},
		  	type:'POST',
		  	datatype:'JSON',
		  	data: dataString,		  		
		  	success:function(data)
		  	{
		  		if(data.success == 'true')
		  		{
		  			alert('Registro Correcto!');
		  			$('#guardarSitio').addClass('disabledTab');

		  			$('#pnlEvolucion').removeClass('disabledTab');

		  		}
		  	},
		  	error:function(data)
		  	{
				alert(JSON.stringify(data));
		  	}
		});
		e.preventDefault();
	});

	//------------------------Evolucion
	$('#guardarEvolucion').on('click',function(e){
		
		var id_internacion = $('#id_internacion').val();
		var id_medico = $('#id_medico').val();		
		var tipo_evolucion = $('#tipo_evolucion').val();
		var subjetivo = $('#subjetivo').val();
		var objetivo = $('#objetivo').val();
		var glasgow = $('#glasgow').val();
		var frecuencia_cardiaca = $('#frecuencia_cardiaca').val();
		var frecuencia_respiratoria = $('#frecuencia_respiratoria').val();
		var presion_sistolica = $('#presion_sistolica').val();
		var presion_diastolica = $('#presion_diastolica').val();
		var peso = $('#peso').val();
		var talla = $('#talla').val();
		var temperatura = $('#temperatura').val();
		var plan = $('#plan').val();
		var tipo_conducta = $('#tipo_conducta').val();
		var fecha_hora = $('#fecha_hora').val();
		var estado = $('#estadoE').val();
		var token = $("input[name=_token]").val();

		var url = "{{ route('evolucion.store') }}";

		var dataString = {id_internacion:id_internacion, id_medico:id_medico, tipo_evolucion:tipo_evolucion, subjetivo:subjetivo, objetivo:objetivo, glasgow:glasgow, frecuencia_cardiaca:frecuencia_cardiaca, frecuencia_respiratoria:frecuencia_respiratoria, presion_sistolica:presion_sistolica, presion_diastolica:presion_diastolica, peso:peso, talla:talla, temperatura:temperatura, plan:plan, tipo_conducta:tipo_conducta, fecha_hora:fecha_hora, estado:estado, token:token};

		$.ajax({
			url:url,
		  	headers:{'X-CSRF-TOKEN':token},
		  	type:'POST',
		  	datatype:'JSON',
		  	data: dataString,		  		
		  	success:function(data)
		  	{
		  		if(data.success == 'true')
		  		{
		  			alert('Registro Correcto!');
		  			$('#guardarEvolucion').addClass('disabledTab');
		  			switch (tipo_conducta){
		  				case "TCI1":
		  					document.location.href = "{{ route('internacion.index') }}";
		  					break;
		  				case "TCI2":
		  					//transferencia a otra unidad
		  					document.location.href = "{{ url('/cambiarsitiointernacion') }}/"+id_internacion+""+id_medico+"";
		  					break;
		  				case "TCI3":
		  					//transferencia a otra institucion
		  					//codigo 810 se refiere a que la transferencia tiene origen en la internacion
		  					document.location.href = "{{ url('/ordentransferencia') }}/"+id_internacion+"/"+id_medico+"/"+810+"";
		  					break;
		  				case "TCI4":
		  					//cirugia programada
		  					break;
		  				case "TCI5":
		  					//cirugia de urgencia
		  					break;
		  				case "TCI6":
		  					//valoracion por otra especialidad
		  					//debe crearse la orden de valoracion
		  					break;
		  				case "TCI7":
		  					//alta medica
		  					//debe crearse la nota de alta
		  					break;
		  				case "TCI8":
		  					//alta solicitada
		  					//debe crearse la nota de alta
		  					break;
		  			}
		  			//document.location.href = "{ url('/consultamenu') }}/"+idc+"/"+idm+"";
		  		}
		  	},
		  	error:function(data)
		  	{
				alert(JSON.stringify(data));
		  	}
		});
		e.preventDefault();
	});
</script>
@stop