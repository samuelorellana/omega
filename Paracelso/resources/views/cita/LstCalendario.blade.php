@extends('layouts.app1')

@section('calendario')
	{!! Html::style('fullcalendar/fullcalendar.css') !!}
@endsection
@section('calendarioJS')
	{!! Html::script('fullcalendar/lib/moment.min.js') !!}
    {!! Html::script('fullcalendar/fullcalendar.js') !!}
    {!! Html::script('fullcalendar/lang/es.js') !!}
@endsection

@section('content')

<div class="panel panel-default marco_trabajo">
	<div class="panel-headind">
		<div class="container-fluid">
			<h1>Agenda de Citas</h1>
		</div>
		<div class="container">
		<a href="{{ route('cita.create') }}" class="btn btn-primary">Nueva Cita</a>
		<a href="{{ route('cita.index') }}" class="btn btn-info">Vista Tabla</a>
		</div>
	</div>

	<div class="panel-body">
		<div id="calendar">
		
		</div>
	</div>
</div>

@endsection

@section('javascript')
<script>
	$(document).ready(function(){
		$_token = "{{ csrf_token() }}";
		$.post('/CalendarioCitas',{_token:$_token},function(data){
			//alert(data);

			$('#calendar').fullCalendar({
		        
		    	height: 500,

		        header:{
		        	left: 'prev,next today',
		        	center: 'title',
		        	right: 'month,agendaWeek,agendaDay'
		        },
		        eventLimit:true,
		        views:{
		        	agenda:{
		        		eventLimit:3
		        	}
		        },
		        editable: false,

		        droppable: false,

		        events: $.parseJSON(data),

		  //       eventRender: function (event, element) {
		  //       	element.css('background',event.class);
				// },

		        eventClick: function(calEvent, jsEvent, view) {

			    	alert('PACIENTE: ' + calEvent.title + '\n MEDICO: '+calEvent.content + '\n MOTIVO: ' + calEvent.motivo);
				}

		 	});
		});
	});
</script>

@stop