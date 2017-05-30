@extends('layouts.app1')

@section('content')
<div class="panel panel-default marco_trabajo">
	@include('Errores')

	<div class="panel-heading">
		<h3><a href="javascript:window.history.back();" class="btn btn-warning">Atras</a> <strong>Crear Consulta Medica para:</strong></h3>
		@include('persona.LstDatosBasicos')
	</div>

	<div class="panel-body">
		<div class="row container-fluid">
			<div><span style="float: right;"><small>Fecha y Hora de Consulta : {{ $fecha->toDateTimeString() }}</small></span> <h4>Datos Importantes</h4> </div>
			
			{!! Form::open(['id'=>'formConsulta']) !!}
				{{-- <div class="row"> --}}
					<div class="form-group col-sm-3 col-md-3">
				    	<div class="input-group">
				            <span class="input-group-addon"># Cons.</span>
							{!! Form::number('id_consultorio',null,['id'=>'id_consultorio','class'=>'form-control','placeholder'=>'Numero de consultorio']) !!}
						</div>
					</div>
					<div class="form-group col-sm-3 col-md-3">
						<div class="input-group">
							<span class="input-group-addon">Tipo</span>
							{!! Form::select('tipo_consulta',$tipoConsulta,null,['id'=>'tipo_consulta','class'=>'form-control']) !!}
						</div>
					</div>
					<div class="form-group col-sm-6 col-md-6">
						<div class="input-group">
							<span class="input-group-addon">Medico</span>
							{!! Form::select('id_medico',$medicos,null,['id'=>'id_medico','class'=>'form-control']) !!}
						</div>
					</div>
				{{-- </div> --}}
				{{-- <div class="row"> --}}
					<div class="form-group col-sm-4 col-md-4">
				    	<div class="input-group">
				            <span class="input-group-addon">Motivo</span>
							{!! Form::text('motivo_consulta',null,['id'=>'motivo_consulta','class'=>'form-control','placeholder'=>'Motivo de Consulta','onkeyup'=>'mayuscula(motivo_consulta)']) !!}
						</div>
					</div>

					<div class="form-group col-sm-7 col-md-7">
				    	<div class="input-group">
				            <span class="input-group-addon">Enfermedad Actual</span>
							{!! Form::text('historia',null,['id'=>'historia','class'=>'form-control','placeholder'=>'Enfermedad Actual','onkeyup'=>'mayuscula(historia)']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
					</div>
					
					<div class="form-group">
						{!! Form::hidden('fecha_hora',$fecha,['id'=>'fecha_hora','class'=>'form-control','placeholder'=>'fecha']) !!}
					</div>

					<div class="form-group col-sm-1 col-md-1">
						{!! link_to('#','Guardar',['id'=>'guardarConsulta','class'=>'btn btn-primary']) !!}
					</div>
					
					
					<div class="form-group">
						{!! Form::hidden('id_consulta','',['id'=>'id_consulta','class'=>'form-control','placeholder'=>'idh']) !!}
					</div>
				{{-- </div> --}}
			{!! Form::close() !!}
		</div>

		<!-- EXAMEN FISICO - REVISIONES -->
		<div class="row container-fluid">
			<h4>Examen Fisico</h4>
			<div class="panel panel-default disabledTab" id="pnlRevision">				
				<div class="panel-body">
					{!! Form::open(['id'=>'formRevision']) !!}
						<div class="form-group col-sm-10 col-md-10">
					    	<div class="input-group">
					            <span class="input-group-addon">Ex.General</span>
								{!! Form::text('revision_general',null,['id'=>'revision_general','class'=>'form-control','placeholder'=>'Revision fisica general','onkeyup'=>'mayuscula(revision_general)']) !!}
							</div>
						</div>
						<button type="button" id="mostrarP" class="btn btn-primary btn-sm col-sm-2 col-md-2">Ex.Segmentario</button>
						<button type="button" id="ocultarP" class="btn btn-success btn-sm col-sm-2 col-md-2">Ocultar</button>

						<div class="row container-fluid" id="EFS">
							<div class="form-group col-sm-3 col-md-3">
					            {{-- <span class="form-group-addon">Cabeza y cuello</span> --}}
								{!! Form::text('cabeza_cuello',null,['id'=>'cabeza_cuello','class'=>'form-control','placeholder'=>'Cabeza y cuello','onkeyup'=>'mayuscula(cabeza_cuello)']) !!}
							</div>
							<div class="form-group col-sm-3 col-md-3">
					            {{-- <span class="form-group-addon">Revision General</span> --}}
								{!! Form::text('torax',null,['id'=>'torax','class'=>'form-control','placeholder'=>'Torax','onkeyup'=>'mayuscula(torax)']) !!}
							</div>
							<div class="form-group col-sm-3 col-md-3">
					           	{{-- <span class="form-group-addon">Revision General</span> --}}
								{!! Form::text('miembros_superiores',null,['id'=>'miembros_superiores','class'=>'form-control','placeholder'=>'M. superiores','onkeyup'=>'mayuscula(miembros_superiores)']) !!}
							</div>
							<div class="form-group col-sm-3 col-md-3">
					            {{-- <span class="form-group-addon">Revision General</span> --}}
								{!! Form::text('abdomen',null,['id'=>'abdomen','class'=>'form-control','placeholder'=>'Abdomen','onkeyup'=>'mayuscula(abdomen)']) !!}
							</div>
							<div class="form-group col-sm-3 col-md-3">
					            {{-- <span class="form-group-addon">Revision General</span> --}}
								{!! Form::text('genital_urinario',null,['id'=>'genital_urinario','class'=>'form-control','placeholder'=>'Genitourinario','onkeyup'=>'mayuscula(genital_urinario)']) !!}
							</div>
							<div class="form-group col-sm-3 col-md-3">
					            {{-- <span class="form-group-addon">Revision General</span> --}}
								{!! Form::text('miembros_inferiores',null,['id'=>'miembros_inferiores','class'=>'form-control','placeholder'=>'M. Inferiores','onkeyup'=>'mayuscula(miembros_inferiores)']) !!}
							</div>
							<div class="form-group col-sm-3 col-md-3">
					            {{-- <span class="form-group-addon">Revision General</span> --}}
								{!! Form::text('neurologico',null,['id'=>'neurologico','class'=>'form-control','placeholder'=>'Neurologico','onkeyup'=>'mayuscula(neurologico)']) !!}
							</div>
							<div class="form-group col-sm-3 col-md-3">
					            {{-- <span class="form-group-addon">Revision General</span> --}}
								{!! Form::text('otros',null,['id'=>'otros','class'=>'form-control','placeholder'=>'Otros Sist.','onkeyup'=>'mayuscula(otros)']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::hidden('estadoR','AC',['id'=>'estadoR','class'=>'form-control','placeholder'=>'Estado']) !!}
						</div>

						{!! link_to('#','Guardar',['id'=>'guardarR','class'=>'btn btn-primary btn-sm m-t-10']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>

		<!-- EVALUACIONES -->
		<div class="row container-fluid">
			<h4>Evaluacion-Diagnosticos-Ordenes-Tratamiento</h4>
			<div class="panel panel-default disabledTab" id="pnlEvaluacion">
				<div class="panel-body">
					{!! Form::open(['id'=>'formEvaluacion']) !!}
						<div class="form-group col-sm-5 col-md-5">
					    	<div class="input-group">
					            <span class="input-group-addon">Lab.Previos</span>
								{!! Form::text('laboratorio',null,['id'=>'laboratorio','class'=>'form-control','placeholder'=>'Lab.Previos','onkeyup'=>'mayuscula(laboratorio)']) !!}
							</div>
						</div>
						<div class="form-group col-sm-5 col-md-5">
					    	<div class="input-group">
					            <span class="input-group-addon">Gab.Previos</span>
								{!! Form::text('gabinete',null,['id'=>'gabinete','class'=>'form-control','placeholder'=>'Gab.Previos','onkeyup'=>'mayuscula(gabinete)']) !!}
							</div>
						</div>
						{{-- <div class="form-group col-sm-3 col-md-3">
							<div class="input-group">
								<span class="input-group-addon">Conducta a Seguir</span>
								{!! Form::select('tipo_conducta',$tipoConducta,null,['id'=>'tipo_conducta','class'=>'form-control']) !!}
							</div>
						</div> --}}
						<div class="form-group">
							{!! Form::hidden('tipo_conducta','TPCN',['id'=>'tipo_conducta','class'=>'form-control','placeholder'=>'conducta']) !!}
						</div>

						<div class="form-group">
							{!! Form::hidden('estadoE','AC',['id'=>'estadoE','class'=>'form-control','placeholder'=>'Estado']) !!}
						</div>
						<div class="form-group col-sm-2 col-md-2">
							{!! link_to('#','Guardar',['id'=>'guardarE','class'=>'btn btn-primary btn-sm m-t-10']) !!}
						</div>						

						<div class="form-group">
							{!! Form::hidden('id_evaluacion','',['id'=>'id_evaluacion','class'=>'form-control','placeholder'=>'idc']) !!}
						</div>
					{!! Form::close() !!}

					<!-- DIAGNOSTICOS -->
					<div class="col-sm-6 col-md-3">
						<h4><a href="#" data-toggle="modal" data-target="#ModalDiagnosticos" class="btn btn-info disabledTab" id="btnDiagnosticos">+ Diagnosticos</a></h4>
						<div class="panel panel-default" id="Tab2">
							<div class="panel-body">
							    <div class="container" id="ListaDiagnosticos">
						            	<!-- RESULTADO DE LA BUSQUEDA LstDiagnosticos C --> 
						        </div>
							</div>
						</div>
					</div>

					<!-- ORDENES LAB -->
					<div class="col-sm-6 col-md-3">
						<h4><a href="#" data-toggle="modal" data-target="#ModalOrdenesL" class="btn btn-info disabledTab" id="btnOrdenL">+ Orden Lab.</a></h4>
						<div class="panel panel-default" id="Tab3">
							<div class="panel-body">
							    <div class="container" id="ListaOrdenesL">
						            	<!-- RESULTADO DE LA BUSQUEDA LstAlergias --> 
						        </div>
							</div>
						</div>
					</div>

					<!-- ORDENES GAB -->
					<div class="col-sm-6 col-md-3">
						<h4><a href="#" data-toggle="modal" data-target="#ModalOrdenesG" class="btn btn-info disabledTab" id="btnOrdenG">+ Orden Gab.</a></h4>
						<div class="panel panel-default" id="Tab4">
							<div class="panel-body">
							    <div class="container" id="ListaOrdenesG">
						            	<!-- RESULTADO DE LA BUSQUEDA LstAlergias --> 
						        </div>
							</div>
						</div>
					</div>

					<!-- MEDICAMENTOS -->
					<div class="col-sm-6 col-md-3">
						<h4><a href="#" data-toggle="modal" data-target="#ModalMedicamentos" class="btn btn-info disabledTab" id="btnTratamientos">+ Tratamiento</a></h4>
						<div class="panel panel-default" id="Tab5">
							<div class="panel-body">
							    <div class="container" id="ListaTratamientos">
						            	<!-- RESULTADO DE LA BUSQUEDA LstAlergias --> 
						        </div>
							</div>
						</div>
					</div>

					<div class="container-fluid">
						<h4><a href="#" class="btn btn-primary" onclick="redireccion();">Finalizar Consulta</a></h4>
						{{-- {!! link_to('#','Crear Documentacion Complementaria Para la Consulta Realizada',['id'=>'crearDocs','class'=>'btn btn-primary btn-sm m-t-10 disabledTab']) !!} --}}
					</div>

				</div>
			</div>
		</div>

		
	</div>
</div>

	@include('consulta.ModalDiagnosticos')
	@include('consulta.ModalOrdenesL')
	@include('consulta.ModalOrdenesG')
	@include('consulta.ModalMedicamentos')

@endsection

@section('javascript')
<script>
	$(document).ready(function(){
		$('#EFS').hide();
		$('#ocultarP').hide();
	});

	$('#mostrarP').click(function(){
		$('#EFS').show();
		$('#ocultarP').show();
		$('#mostrarP').hide();
	});

	$('#ocultarP').click(function(){
		$('#EFS').hide();
		$('#ocultarP').hide();
		$('#mostrarP').show();
	});

	//--------------------- CONSULTA
	$('#guardarConsulta').on('click',function(e){
		var id_consultorio = $('#id_consultorio').val();
		var id_medico = $('#id_medico').val();		
		var tipo_consulta = $('#tipo_consulta').val();
		var motivo_consulta = $('#motivo_consulta').val();
		var historia = $('#historia').val();
		var fecha = $('#fecha_hora').val();
		var hora = $('#fecha_hora').val();
		var estado = $('#estado').val();
		var token = $("input[name=_token]").val();

		var url = "{{ route('consulta.store') }}";

		var dataString = {id_consultorio:id_consultorio, id_medico:id_medico, tipo_consulta:tipo_consulta, motivo_consulta:motivo_consulta, historia:historia, fecha:fecha, hora:hora, estado:estado, token:token};
		
		//alert(url);

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
		  			alert('Consulta se Guardo Correctamente!');
		  			$('#guardarConsulta').addClass('disabledTab');

		  			$('#pnlRevision').removeClass('disabledTab');
		  			$('#pnlEvaluacion').removeClass('disabledTab');

		  			//alert(data.id);
		  			
		  			document.getElementById("id_consulta").setAttribute("value",JSON.stringify(data.id));
		  			//alert(data.id);
		  		}
		  	},
		  	error:function(data)
		  	{
				alert(JSON.stringify(data));
		  	}
		});
		e.preventDefault();
	});

	//----------------------------------------------- REVISION

	$('#guardarR').on('click',function(e){

		var id_consulta = $('#id_consulta').val();
		var revision_general = $('#revision_general').val();
		var cabeza_cuello = $('#cabeza_cuello').val();
		var torax = $('#torax').val();
		var miembros_superiores = $('#miembros_superiores').val();
		var abdomen = $('#abdomen').val();
		var miembros_inferiores = $('#miembros_inferiores').val();
		var genital_urinario = $('#genital_urinario').val();
		var neurologico = $('#neurologico').val();
		var otros = $('#otros').val();
		var estado = $('#estadoR').val();
		
		var token = $("input[name=_token]").val();

		var url = "{{ route('revisionconsulta.store') }}";

		var dataStringA = {id_consulta:id_consulta,revision_general:revision_general, cabeza_cuello:cabeza_cuello, torax:torax, miembros_superiores:miembros_superiores, abdomen:abdomen, miembros_inferiores:miembros_inferiores, genital_urinario:genital_urinario, neurologico:neurologico, otros:otros, estado:estado, token:token};
		
		//alert(url);

		$.ajax({
			url:url,
		  	headers:{'X-CSRF-TOKEN':token},
		  	type:'POST',
		  	datatype:'JSON',
		  	data: dataStringA,		  		
		  	success:function(data)
		  	{
		  		if(data.success == 'true')
		  		{
		  			alert('Revision se Guardo Correctamente!');
		  			$('#guardarR').addClass('disabledTab');
		  			//$('#Tab3').removeClass('disabledTab');
		  			//listarAlergias();
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

	//----------------------------------------------- EVALUACION

	$('#guardarE').on('click',function(e){

		var id_consulta = $('#id_consulta').val();
		var laboratorio = $('#laboratorio').val();
		var gabinete = $('#gabinete').val();
		var tipo_conducta = $('#tipo_conducta').val();
		
		var estado = $('#estadoE').val();
		
		var token = $("input[name=_token]").val();

		var url = "{{ route('evaluacionconsulta.store') }}";

		var dataStringA = {id_consulta:id_consulta,laboratorio:laboratorio, gabinete:gabinete, tipo_conducta:tipo_conducta, estado:estado, token:token};
		
		//alert(url);

		$.ajax({
			url:url,
		  	headers:{'X-CSRF-TOKEN':token},
		  	type:'POST',
		  	datatype:'JSON',
		  	data: dataStringA,		  		
		  	success:function(data)
		  	{
		  		if(data.success == 'true')
		  		{
		  			alert('Evaluacion se Guardo Correctamente.');
		  			$('#guardarE').addClass('disabledTab');
		  			$('#btnDiagnosticos').removeClass('disabledTab');
		  			$('#btnOrdenL').removeClass('disabledTab');
		  			$('#btnOrdenG').removeClass('disabledTab');
		  			$('#btnTratamientos').removeClass('disabledTab');
		  			$('#crearDocs').removeClass('disabledTab');

		  			document.getElementById("id_evaluacion").setAttribute("value",JSON.stringify(data.id));
		  			//listarAlergias();
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

	function redireccion()
	{
		var idc = $('#id_consulta').val();
		var idm = $('#id_medico').val();
		document.location.href = "{{ url('/consultamenu') }}/"+idc+"/"+idm+"";
	}


	//----------------------------------------------- DIAGNOSTICOS

	$('#guardarD').on('click',function(e){

		var id_evaluacion_consulta = $('#id_evaluacion').val();
		var tipo_diagnostico = $('#tipo_diagnostico').val();
		var descripcion = $('#descripcion').val();
		
		var estado = $('#estadoD').val();
		
		var token = $("input[name=_token]").val();

		var url = "{{ route('diagnosticosC.store') }}";

		var dataStringA = {id_evaluacion_consulta:id_evaluacion_consulta,tipo_diagnostico:tipo_diagnostico, descripcion:descripcion, estado:estado, token:token};
		
		//alert(url);

		$.ajax({
			url:url,
		  	headers:{'X-CSRF-TOKEN':token},
		  	type:'POST',
		  	datatype:'JSON',
		  	data: dataStringA,		  		
		  	success:function(data)
		  	{
		  		if(data.success == 'true')
		  		{
		  			alert('Diagnostico se Guardo Correctamente!');
		  			
		  			/*$('#guardar').addClass('disabledTab');*/
		  			// $('#Tab5').removeClass('disabledTab');
		  			// $('#Tab6').removeClass('disabledTab');
		  			// $('#Tab7').removeClass('disabledTab');
		  			listarDiagnosticos();
		  			
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

	var listarDiagnosticos = function(){
		var id_evaluacion_consulta=$('#id_evaluacion').val();
		$.ajax({
			type:'GET',
			url:'{{ url('diagnosticosC') }}',
			data: { id_evaluacion_consulta:id_evaluacion_consulta },
			success:function(data)
			{
				$('#ListaDiagnosticos').empty().html(data);
			}
		});
	}

	var eliminarD = function (id)
	{
		alert.confirm('Esta a punto de eliminar el registro seleccionado').then(function(){
			var rutaEA= "{{ url('diagnosticosC') }}/"+id+"";
			var token= $('#token').val();
			$.ajax({
				url:rutaEA,
				headers:{'X-CSRF-TOKEN': token},
				type:'DELETE',
				dataType:'JSON',
				success: function(data){
					if(data.success == 'true')
					{
						listarDiagnosticos();
						alert('Se elimino el registro');
					}
				},
				error:function(data)
			  	{
					
			  	}
			});
		});
	}

	//----------------------------------------------- LABORATORIOS

	$('#guardarL').on('click',function(e){

		var id_consulta = $('#id_consulta').val();
		var tipo_laboratorio = $('#tipo_laboratorio').val();
		var orden = $('#orden').val();
		var fecha_hora = $('#fecha_hora').val();

		var urgente="";
		if( $('#urgenteL').prop('checked') ) { urgente = "SI"; }
		else { urgente = "NO"; }

		var estado = $('#estadoOL').val();
		
		var token = $("input[name=_token]").val();

		var url = "{{ route('ordenesL.store') }}";

		var dataStringA = {id_consulta:id_consulta,tipo_laboratorio:tipo_laboratorio, orden:orden, fecha_hora:fecha_hora, urgente:urgente, estado:estado, token:token};
		
		//alert(url);

		$.ajax({
			url:url,
		  	headers:{'X-CSRF-TOKEN':token},
		  	type:'POST',
		  	datatype:'JSON',
		  	data: dataStringA,		  		
		  	success:function(data)
		  	{
		  		if(data.success == 'true')
		  		{
		  			alert('Orden de Laboratorio se Guardo Correctamente');
		  			
		  			/*$('#guardar').addClass('disabledTab');*/
		  			/*$('#Tab6').removeClass('disabledTab');*/
		  			listarOrdenesL();
		  			
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

	var listarOrdenesL = function(){
		var id_consulta=$('#id_consulta').val();
		$.ajax({
			type:'GET',
			url:'{{ url('ordenesL') }}',
			data: { id_consulta:id_consulta },
			success:function(data)
			{
				$('#ListaOrdenesL').empty().html(data);
			}
		});
	}

	var eliminarOL = function (id)
	{
		alert.confirm('Esta a punto de eliminar el registro seleccionado').then(function(){
			var rutaEA= "{{ url('ordenesL') }}/"+id+"";
			var token= $('#token').val();
			$.ajax({
				url:rutaEA,
				headers:{'X-CSRF-TOKEN': token},
				type:'DELETE',
				dataType:'JSON',
				success: function(data){
					if(data.success == 'true')
					{
						listarOrdenesL();
						alert('Se elimino el registro');
					}
				},
				error:function(data)
			  	{
					
			  	}
			});
		});
	}

	//----------------------------------------------- GABINETES

	$('#guardarG').on('click',function(e){

		var id_consulta = $('#id_consulta').val();
		var tipo_gabinete = $('#tipo_gabinete').val();
		var complemento = $('#complemento').val();
		var orden = $('#ordenG').val();
		var fecha_hora = $('#fecha_hora').val();

		var urgente="";
		if( $('#urgenteG').prop('checked') ) { urgente = "SI"; }
		else { urgente = "NO"; }

		var estado = $('#estadoOG').val();
		
		var token = $("input[name=_token]").val();

		var url = "{{ route('ordenesG.store') }}";

		var dataStringA = {id_consulta:id_consulta,tipo_gabinete:tipo_gabinete, complemento:complemento, orden:orden, fecha_hora:fecha_hora, urgente:urgente, estado:estado, token:token};
		
		//alert(url);

		$.ajax({
			url:url,
		  	headers:{'X-CSRF-TOKEN':token},
		  	type:'POST',
		  	datatype:'JSON',
		  	data: dataStringA,		  		
		  	success:function(data)
		  	{
		  		if(data.success == 'true')
		  		{
		  			alert('Orden de Gab se Guardo Correctamente');
		  			
		  			/*$('#guardar').addClass('disabledTab');*/
		  			/*$('#Tab7').removeClass('disabledTab');*/
		  			listarOrdenesG();
		  			
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

	var listarOrdenesG = function(){
		var id_consulta=$('#id_consulta').val();
		$.ajax({
			type:'GET',
			url:'{{ url('ordenesG') }}',
			data: { id_consulta:id_consulta },
			success:function(data)
			{
				$('#ListaOrdenesG').empty().html(data);
			}
		});
	}

	var eliminarOG = function (id)
	{
		alert.confirm('Esta a punto de eliminar el registro seleccionado').then(function(){
			var rutaEA= "{{ url('ordenesG') }}/"+id+"";
			var token= $('#token').val();
			$.ajax({
				url:rutaEA,
				headers:{'X-CSRF-TOKEN': token},
				type:'DELETE',
				dataType:'JSON',
				success: function(data){
					if(data.success == 'true')
					{
						listarOrdenesG();
						alert('Se elimino el registro');
					}
				},
				error:function(data)
			  	{
					
			  	}
			});
		});
	}

	//----------------------------------------------- TRATAMIENTOS

	$('#guardarT').on('click',function(e){

		var id_consulta = $('#id_consulta').val();
		var tipo_tratamiento = $('#tipo_tratamiento').val();
		var codigo_medicamento = $('#codigo_medicamento').val();
		var prescripcion = $('#prescripcion').val();
		// var fecha = $('#fecha').val();

		var estado = $('#estadoT').val();
		
		var token = $("input[name=_token]").val();

		var url = "{{ route('tratamientosC.store') }}";

		var dataStringA = {id_consulta:id_consulta,tipo_tratamiento:tipo_tratamiento,prescripcion:prescripcion, codigo_medicamento:codigo_medicamento, estado:estado, token:token};
		
		//alert(url);

		$.ajax({
			url:url,
		  	headers:{'X-CSRF-TOKEN':token},
		  	type:'POST',
		  	datatype:'JSON',
		  	data: dataStringA,		  		
		  	success:function(data)
		  	{
		  		if(data.success == 'true')
		  		{
		  			alert('Tratamiento se Guardo Correctamente!');
		  			
		  			/*$('#guardar').addClass('disabledTab');*/
		  			/*$('#Tab7').removeClass('disabledTab');*/
		  			listarTratamientos();
		  			
		  		}
		  	},
		  	error:function(data)
		  	{
				
		  	}
		});
		e.preventDefault();
	});

	var listarTratamientos = function(){
		var id_consulta=$('#id_consulta').val();
		$.ajax({
			type:'GET',
			url:'{{ url('tratamientosC') }}',
			data: { id_consulta:id_consulta },
			success:function(data)
			{
				$('#ListaTratamientos').empty().html(data);
			}
		});
	}

	var eliminarT = function (id)
	{
		alert.confirm('Esta a punto de eliminar el registro seleccionado').then(function(){
			var rutaEA= "{{ url('tratamientosC') }}/"+id+"";
			var token= $('#token').val();
			$.ajax({
				url:rutaEA,
				headers:{'X-CSRF-TOKEN': token},
				type:'DELETE',
				dataType:'JSON',
				success: function(data){
					if(data.success == 'true')
					{
						listarTratamientos();
						alert('Se elimino el registro');
					}
				},
				error:function(data)
			  	{
					
			  	}
			});
		});
	}
</script>
@stop