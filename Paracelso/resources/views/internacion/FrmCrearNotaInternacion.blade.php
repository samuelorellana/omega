@extends('layouts.app1')

@section('content')
<div class="panel panel-default marco_trabajo">
	@include('Errores')

	<div class="panel-heading">
		<h3><a href="javascript:window.history.back();" class="btn btn-warning">Atras</a> <strong>Crear Nota de Evolucion para:</strong></h3>
		@include('persona.LstDatosBasicos')
	</div>

	<div class="panel-body">
	
		@include('internacion.SitioInternacion')

		@include('internacion.Evolucion')
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
		  					document.location.href = "{{ url('/cambiarsitiointernacion') }}/"+id_internacion+"/"+id_medico+"";
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