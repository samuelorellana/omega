@extends('layouts.app1')
@section('content')

<div class="panel panel-default marco_trabajo">
	@include('Errores')	

	<div class="panel-heading">
		<h3><strong>Crear Historia Clinica para:</strong></h3>
		@include('persona.LstDatosBasicos')
	</div>

	<div class="panel-body">
		<div class="row container-fluid">
			<div><span style="float: right;"><small>Fecha y Hora de Historia : {{ $fecha->toDateTimeString() }}</small></span> <h4>Datos Importantes</h4> </div> 
				{!! Form::open(['id'=>'formHistoria']) !!}

				    <div class="form-group col-sm-7 col-md-3">
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
			
					<div class="form-group col-sm-5 col-md-3">
						<div class="input-group">
							<span class="input-group-addon">Gr.Sanguineo</span>
							<select class="form-control" id="grupo_sanguineo">
								<option value="O Rh(+)">O Rh(+)</option>
		                        <option value="A Rh(+)">A Rh(+)</option>
		                        <option value="B Rh(+)">B Rh(+)</option>
		                        <option value="AB Rh(+)">AB Rh(+)</option>
		                        <option value="O Rh(-)">O Rh(-)</option>
		                        <option value="A Rh(-)">A Rh(-)</option>
		                        <option value="B Rh(-)">B Rh(-)</option>
		                        <option value="AB Rh(-)">AB Rh(-)</option>
							</select>
						</div>
				    </div>

				    <div class="form-group col-sm-9 col-md-5">
				    	<div class="input-group">
				            <span class="input-group-addon">Notas</span>
							{!! Form::text('nota',null,['id'=>'nota','class'=>'form-control','placeholder'=>'Notas','onkeyup'=>'mayuscula(nota)']) !!}
						</div>
					</div>
					
					<div class="form-group col-sm-3 col-md-1">
						{!! link_to('#','Guardar',['id'=>'guardarHistoria','class'=>'btn btn-primary']) !!}
					</div>
					
					
					<div class="form-group">
						{!! Form::hidden('id_historia','',['id'=>'id_historia','class'=>'form-control','placeholder'=>'idh']) !!}
					</div>
					{{-- <button id="mostrar" type="button">Mostrar</button> --}}
				{!! Form::close() !!}
			
		</div>
		<div class="row">
			<!-- ALERGIAS -->
			<div class="col-sm-6 col-md-3">
				<h4><a href="#" data-toggle="modal" data-target="#ModalAlergias" class="btn btn-info disabledTab" id="btnAlergias">+ Alergias</a></h4>
				<div class="panel panel-default" id="Tab2">
					<div class="panel-body">
					    <div class="container" id="ListaAlergias">
				            	<!-- RESULTADO DE LA BUSQUEDA LstAlergias --> 
				        </div>
					</div>
				</div>
			</div>
			<!-- DIAGNOSTICOS -->
			<div class="col-sm-6 col-md-3">
				<h4><a href="#" data-toggle="modal" data-target="#ModalDiagnosticos" class="btn btn-info disabledTab" id="btnDiagnosticos">+ Diagnosticos Previos</a></h4>
				<div class="panel panel-default" id="Tab3">
				<div class="panel-body">
					<div class="container" id="ListaDiagnosticos">
		            	<!-- RESULTADO DE LA BUSQUEDA LstDiagnosticos --> 
		        	</div>
				</div>
				</div>
			</div>
			<!-- TRATAMIENTOS -->
			<div class="col-sm-6 col-md-3">
				<h4><a href="#" data-toggle="modal" data-target="#ModalTratamientos" class="btn btn-info disabledTab" id="btnTratamientos">+Tratamientos Previos</a></h4>
				<div class="panel panel-default" id="Tab4">
					<div class="panel-body">
			        	<div class="container" id="ListaTratamientos">
		            	<!-- RESULTADO DE LA BUSQUEDA LstTratamientos --> 
		        		</div>
			      	</div>
				</div>
			</div>
			<!-- ANTECEDENTES -->
			<div class="col-sm-6 col-md-3">
				<h4><a href="#" data-toggle="modal" data-target="#ModalAntecedentes" class="btn btn-info disabledTab" id="btnAntecedentes">+Antecedentes</a></h4>
				<div class="panel panel-default" id="Tab5">
					<div class="panel-body">
						<div class="container" id="ListaAntecedentes">
			            	<!-- RESULTADO DE LA BUSQUEDA --> 
			        	</div>
				  	</div>
				</div>
			</div>
			
		</div>
		<div class="row">
			<!-- HABITOS -->
			<div class="col-sm-6 col-md-3">
				<h4><a href="#" data-toggle="modal" data-target="#ModalHabitos" class="btn btn-info disabledTab" id="btnHabitos">+Habitos Personales</a></h4>
				<div class="panel panel-default" id="Tab6">
					<div class="panel-body">
						<div class="container" id="ListaHabitos">
		            	<!-- RESULTADO DE LA BUSQUEDA --> 
		        		</div>
				  	</div>
				</div>
			</div>
		</div>
	</div>
</div>

	@include('historia.ModalAlergias')
	@include('historia.ModalDiagnosticos')
	@include('historia.ModalTratamientos')
	@include('historia.ModalAntecedentes')
	@include('historia.ModalHabitos')

@endsection

@section('javascript')
	{{-- <script src="{{asset('js/CrearHistoria.js')}}"></script> --}}
	<script>
		$('#guardarHistoria').on('click',function(e)
		{
			alert('en proceso');
			var id_medico = $('#id_medico').val();
			var grupo_sanguineo = $('#grupo_sanguineo').val();
			var nota = $('#nota').val();		
			var token = $("input[name=_token]").val();
			var url = "{{ route('historia.store') }}"

			var dataString = {id_medico:id_medico, grupo_sanguineo:grupo_sanguineo, nota:nota, token:token};
			
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
			  			alert('Historia se Guardo Correctamente!');
			  			$('#guardarHistoria').addClass('disabledTab');
			  			$('#btnAlergias').removeClass('disabledTab');
			  			$('#btnDiagnosticos').removeClass('disabledTab');
			  			$('#btnTratamientos').removeClass('disabledTab');
			  			$('#btnAntecedentes').removeClass('disabledTab');
			  			$('#btnHabitos').removeClass('disabledTab');
			  			document.getElementById("id_historia").setAttribute("value",JSON.stringify(data.id));
			  			//alert(data.id);
			  		}
			  	},
			  	error:function(data)
			  	{
					
			  	}
			});
			e.preventDefault();
		});

		//----------------------------- ALERGIAS
		$('#guardarAlergia').on('click',function(e){

			var id_historia = $('#id_historia').val();
			var tipo_alergia = $('#tipo_alergia').val();
			var severidad = $('#severidad').val();
			var agente = $('#agente').val();
			var estado = $('#estadoA').val();
			
			var token = $("input[name=_token]").val();

			var url = "{{ route('alergia.store') }}";

			var dataStringA = {id_historia:id_historia, tipo_alergia:tipo_alergia, severidad:severidad, agente:agente, estado:estado, token:token};
			
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
			  			alert('Alergia se Guardo Correctamente:');
			  			listarAlergias();
			  		}
			  	},
			  	error:function(data)
			  	{
					
			  	}
			});
			e.preventDefault();
		});

		var listarAlergias = function()
		{
			var id_historia=$('#id_historia').val();
			$.ajax({
				type:'GET',
				url:'{{ url('alergia') }}',
				data: { id_historia:id_historia },
				success:function(data)
				{
					$('#ListaAlergias').empty().html(data);
				}
			});
		}

		//----------------------------------------------- Diagnosticos

		$('#guardarDiagnostico').on('click',function(e){

			var id_historia = $('#id_historia').val();
			var diagnostico = $('#diagnostico').val();
			//var diagnostico_cie10 = $('#diagnostico_cie10').val();
			var agudo_cronico = $('#agudo_cronico').val();
			var comentarios = $('#comentarios').val();
			var estado = $('#estadoD').val();
			
			var token = $("input[name=_token]").val();

			var url = "{{ route('diagnosticosH.store') }}";

			var dataStringA = {id_historia:id_historia, diagnostico:diagnostico, agudo_cronico:agudo_cronico, comentarios:comentarios, estado:estado, token:token};
			
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
			  			alert('Diagnostico se Guardo Correctamente:');
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
			var id_historia=$('#id_historia').val();
			$.ajax({
				type:'GET',
				url:'{{ url('diagnosticosH') }}',
				data: { id_historia:id_historia },
				success:function(data)
				{
					$('#ListaDiagnosticos').empty().html(data);
				}
			});
		}

		//----------------------------------------- tratamientos

		$('#guardarTratamiento').on('click',function(e){

			var id_historia = $('#id_historia').val();
			var tratamiento = $('#tratamiento').val();
			var causa_tratamiento = $('#causa_tratamiento').val();
			var modo_tratamiento = $('#modo_tratamiento').val();
			var estado = $('#estadoT').val();
			
			var token = $("input[name=_token]").val();

			var url = "{{ route('tratamientosH.store') }}";

			var dataStringA = {id_historia:id_historia, tratamiento:tratamiento, causa_tratamiento:causa_tratamiento, modo_tratamiento:modo_tratamiento, estado:estado, token:token};
			
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
			  			alert('Tratamiento se Guardo Correctamente:');
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
			var id_historia=$('#id_historia').val();
			$.ajax({
				type:'GET',
				url:'{{ url('tratamientosH') }}',
				data: { id_historia:id_historia },
				success:function(data)
				{
					$('#ListaTratamientos').empty().html(data);
				}
			});
		}

		//----------------------------------------- antecedentes

		$('#guardarAntecedente').on('click',function(e){

			var id_historia = $('#id_historia').val();
			var tipo_antecedente = $('#tipo_antecedente').val();
			var descripcion = $('#descripcion').val();
			var estado = $('#estadoN').val();
			
			var token = $("input[name=_token]").val();

			var url = "{{ route('antecedentesH.store') }}";

			var dataStringA = {id_historia:id_historia, tipo_antecedente:tipo_antecedente, descripcion:descripcion, estado:estado, token:token};
			
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
			  			alert('Antecedente se Guardo Correctamente:');
			  			listarAntecedentes();
			  		}
			  	},
			  	error:function(data)
			  	{
					
			  	}
			});
			e.preventDefault();
		});

		var listarAntecedentes = function(){
			var id_historia=$('#id_historia').val();
			$.ajax({
				type:'GET',
				url:'{{ url('antecedentesH') }}',
				data: { id_historia:id_historia },
				success:function(data)
				{
					$('#ListaAntecedentes').empty().html(data);
				}
			});
		}

		//----------------------------------------- no patologicos

		$('#guardarHabitos').on('click',function(e){

			var id_historia = $('#id_historia').val();
			var tipo = $('#tipo_habito').val();
			var descripcionh = $('#descripcionh').val();
			var estado = $('#estadoNP').val();
			
			var token = $("input[name=_token]").val();

			var url = "{{ route('anamnesisH.store') }}";

			var dataStringA = {id_historia:id_historia, tipo:tipo, descripcionh:descripcionh, estado:estado, token:token};
			
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
			  			alert('Habito se Guardo Correctamente:');
			  			listarAnamnesis();
			  		}
			  	},
			  	error:function(data)
			  	{
					
			  	}
			});
			e.preventDefault();
		});

		var listarAnamnesis = function(){
			var id_historia=$('#id_historia').val();
			$.ajax({
				type:'GET',
				url:'{{ url('anamnesisH') }}',
				data: { id_historia:id_historia },
				success:function(data)
				{
					$('#ListaHabitos').empty().html(data);
				}
			});
		}

		//----------------------------------------------
		// seccion de eliminar registros

		var eliminarA = function (id)
		{
			alert.confirm('Esta a punto de eliminar el registro seleccionado').then(function(){
				var rutaEA= "{{ url('alergia') }}/"+id+"";
				var token= $('#token').val();
				$.ajax({
					url:rutaEA,
					headers:{'X-CSRF-TOKEN': token},
					type:'DELETE',
					dataType:'JSON',
					success: function(data){
						if(data.success == 'true')
						{
							listarAlergias();
							alert('Se elimino el registro');
						}
					},
					error:function(data)
				  	{
						
				  	}
				});
			});
		}

		var eliminarD = function (id)
		{
			alert.confirm('Esta a punto de eliminar el registro seleccionado').then(function(){
				var rutaEA= "{{ url('diagnosticosH') }}/"+id+"";
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

		var eliminarT = function (id)
		{
			alert.confirm('Esta a punto de eliminar el registro seleccionado').then(function(){
				var rutaEA= "{{ url('tratamientosH') }}/"+id+"";
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

		var eliminarN = function (id)
		{
			alert.confirm('Esta a punto de eliminar el registro seleccionado').then(function(){
				var rutaEA= "{{ url('antecedentesH') }}/"+id+"";
				var token= $('#token').val();
				$.ajax({
					url:rutaEA,
					headers:{'X-CSRF-TOKEN': token},
					type:'DELETE',
					dataType:'JSON',
					success: function(data){
						if(data.success == 'true')
						{
							listarAntecedentes();
							alert('Se elimino el registro');
						}
					},
					error:function(data)
				  	{
						
				  	}
				});
			});
		}

		var eliminarAN = function (id)
		{
			alert.confirm('Esta a punto de eliminar el registro seleccionado').then(function(){
				var rutaEA= "{{ url('anamnesisH') }}/"+id+"";
				var token= $('#token').val();
				$.ajax({
					url:rutaEA,
					headers:{'X-CSRF-TOKEN': token},
					type:'DELETE',
					dataType:'JSON',
					success: function(data){
						if(data.success == 'true')
						{
							listarAnamnesis();
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