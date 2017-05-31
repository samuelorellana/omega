@extends('layouts.app1')

@section('content')

<div class="panel panel-default marco_trabajo">
	@include('Errores')
	<div class="panel-heading">
		<h3><a href="javascript:window.history.back();" class="btn btn-warning">Atras</a> <strong>Internacion</strong></h3>
		{{-- @include('persona.LstDatosBasicos') --}}
	</div>
	<div class="panel-body">
		<div class="container-fluid">
			<div class="col-sm-8 col-md-8">
				<h3>Ordenes de Internacion Existentes</h3>
				<div class="table-responsive">
			        <table class="table table-bordered table-condensed tabla_small">
			            <thead>
		            		<th>Fecha</th>
		            		<th>Paciente</th>
		                    <th>Tipo</th>
		                    <th>Lugar</th>
		                    <th>Medico</th>
		                    <th>Acciones</th>
		                </thead>
			            <tbody>
		                    @foreach($ordenes as $ordeni)
		                    <tr>
		                    	<td>{{ $ordeni->fecha_internacion->toDateString() }}</td>
		                    	<td>{{ $ordeni->persona->nombre }} {{ $ordeni->persona->ap_paterno }}</td>
		                        @if($ordeni->tipo_internacion == "TIIM")
		                            <td {{-- style="color: #009600;" --}}>TRATAMIENTO MEDICO</td>
		                        @elseif($ordeni->tipo_internacion == "TIIQ")
		                            <td {{-- style="color: #FF0000;" --}}>TRATAMIENTO QUIRURGICO</td>
		                        @elseif($ordeni->tipo_internacion == "TIIO")
		                            <td>INTERNACION PARA OBSERVACION</td>
		                        @elseif($ordeni->tipo_internacion == "TIIA")
		                            <td>TRATAMIENTO MEDICO AMBULATORIO</td>
		                        @elseif($ordeni->tipo_internacion == "TIIB")
		                            <td>TRATAMIENTO QUIRURGICO AMBULATORIO</td>
		                        @endif
		                        <td>{{ $ordeni->lugar_internacion }}</td>
		                        <td>{{ $ordeni->medico->personas->nombre }} {{ $ordeni->medico->personas->ap_paterno }}</td>               
		                        <td>
		                            {{-- <a href="{{ route('ordenesI.show',$ordeni->id_orden_internacion) }}">Internar</a> --}}
		                            <a href="#" onclick="confirmar('{{ $ordeni->id_orden_internacion }}');">Internar</a>
		                        </td>
		                    </tr>
		                    @endforeach
		                </tbody>
			        </table>
				</div>
			</div>

			<div class="col-sm-4 col-md-4">

				<h3>Nueva Internacion</h3>

				<a href="{{ route('internacion.show',0) }}" class="btn btn-primary">+ Nueva Internacion</a>

			</div>
		</div>

		<!-- lista de internaciones -->
		<div class="container-fluid">
			<h3>Ordenes de Internacion Existentes</h3>
			<div class="table-responsive">
		        <table class="table table-bordered table-condensed tabla_small">
		            <thead>
		            	<th>Fecha</th>
	            		<th>Unidad</th>
	            		<th>Piso</th>
	                    <th>Cama</th>
	                    <th>Tipo</th>
	                    <th>Paciente</th>
	                    <th>Medico</th>
	                    <th>Conducta</th>
	                </thead>
		            <tbody>
	                    @foreach($internaciones as $internacion)
	                    <tr>
	                    	<td>{{ $internacion->fecha_hora }}</td>
	                    	<td>{{ $internacion->sitio->tipo_unidad }}</td>
	                    	<td>{{ $internacion->sitio->piso }}</td>
	                    	<td>{{ $internacion->sitio->cama }}</td>
	                        @if($internacion->tipo_internacion == "TIIM")
	                            <td {{-- style="color: #009600;" --}}>TRATAMIENTO MEDICO</td>
	                        @elseif($internacion->tipo_internacion == "TIIQ")
	                            <td {{-- style="color: #FF0000;" --}}>TRATAMIENTO QUIRURGICO</td>
	                        @elseif($internacion->tipo_internacion == "TIIO")
	                            <td>INTERNACION PARA OBSERVACION</td>
	                        @elseif($internacion->tipo_internacion == "TIIA")
	                            <td>TRATAMIENTO MEDICO AMBULATORIO</td>
	                        @elseif($internacion->tipo_internacion == "TIIB")
	                            <td>TRATAMIENTO QUIRURGICO AMBULATORIO</td>
	                        @endif
	                        <td>{{ $internacion->persona->nombre }} {{ $internacion->persona->ap_paterno }}</td>
	                        <td>{{ $internacion->medico->personas->nombre }} {{ $internacion->medico->personas->ap_paterno }}</td>
	                        <td>{{ $internacion->tipo_conducta }}</td>
	                        
	                    </tr>
	                    @endforeach
	                </tbody>
		        </table>
			</div>
		</div>
	</div>
</div>


@endsection

@section('javascript')
<script>

	var confirmar = function(id)
	{
		if(confirm('Desea crear Internacion para este paciente?...\n(Importante: al continuar se eliminara esta orden pendiente) \n *** NO SE PUEDE DESHACER ESTA ELIMINACION! ***')==true)
		{
			document.location.href = "{{ url('ejecutarinternacion') }}/"+id+"";
		}
		else
		{
			alert('La orden aun esta pendiente...');
		}
	}
	
</script>

@stop