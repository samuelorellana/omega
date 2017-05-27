@extends('layouts.app1')

@section('content')

<div class="panel panel-default marco_trabajo">
	@include('Errores')
	<div class="panel-heading">
		<h3><a href="javascript:window.history.back();" class="btn btn-warning">Atras</a> <strong>Historial Completo</strong></h3>
		@include('persona.LstDatosBasicos')
	</div>
	<div class="panel-body">
		<div class="container-fluid">
			<div class="col-sm-6 col-md-6">
				<h3>Historia Clinica</h3>
				<h3>{{ $persona->historia->grupo_sanguineo }}</h3>
				<h4>Alergias</h4>
				@foreach($persona->historia->alergias as $alergia)
					<p>Tipo : 
						@if($alergia->tipo_alergia == "TAAL")
			                ALIMENTARIA
			            @elseif($alergia->tipo_alergia == "TAAM")
			                MEDICAMENTOSA
			            @elseif($alergia->tipo_alergia == "TAAA")
			                AMBIENTAL
			            @endif

			            | Severidad: {{ $alergia->severidad }}
			            | Agente: <strong>{{ $alergia->agente }}</strong>
					</p>
		        @endforeach
		        <h4>Antecedentes</h4>
				@foreach($persona->historia->antecedentes_historia as $antecedentes)
					<p>Tipo : 
						@if($antecedente->tipo_antecedente == "TAHP")
		                    PATOLOGICO
		                @elseif($antecedente->tipo_antecedente == "TAHF")
		                    FAMILIAR
		                @elseif($antecedente->tipo_antecedente == "TAHQ")
		                    QUIRURGICO
		                @elseif($antecedente->tipo_antecedente == "TAHO")
		                    OTRO TIPO
		                @endif

			            | Descripcion: <strong>{{ $antecedentes->descripcion }}</strong>
					</p>
		        @endforeach
				<h4>Diagnosticos previos</h4>
				@foreach($persona->historia->diagnosticos_historia as $diagnostico)
					<p>Tipo : 
						@if($diagnostico->agudo_cronico == "A")
			                AGUDO
			            @elseif($diagnostico->agudo_cronico == "C")
			                CRONICO
			            @endif

			            | Diagnostico: <strong>{{ $diagnostico->diagnostico }}</strong>
			            | Obs.: {{ $diagnostico->comentarios }}
					</p>
		        @endforeach
		        <h4>Tratamientos previos</h4>
		        @foreach($persona->historia->tratamientos_historia as $tratamiento)
					<p>Causa: {{ $tratamiento->causa_tratamiento }} 
			            | Medicacion: <strong>{{ $tratamiento->tratamiento }}</strong>
			            | Modo: {{ $tratamiento->modo_tratamiento }}
					</p>
		        @endforeach
		        <h4>Otros</h4>
		        @foreach($persona->historia->anamnesis_historia as $anamnesis)
					<p>Tipo: {{ $anamnesis->tipo }} 
			            | Descripcion: {{ $anamnesis->descripcion }}
					</p>
		        @endforeach
			</div>
			<div class="col-sm-6 col-md-6">
				<div class="row">
					<h3>Consultas</h3>
					<div class="table-responsive">
				        <table class="table table-bordered table-condensed tabla_small">
				            <thead>
				            		<th>Fecha</th>
				                    <th>Tipo</th>
				                    <th>Medico</th>
				                    <th>Motivo</th>
				                    <th>Opciones</th>
				                </thead>
				            <tbody>
				                    @foreach($persona->consultas as $consulta)
				                    <tr>
				                    	<td>{{ $consulta->fecha->toDateString() }}</td>
				                        @if($consulta->tipo_consulta == "TCCN")
				                            <td {{-- style="color: #009600;" --}}>NUEVA</td>
				                        @elseif($consulta->tipo_consulta == "TCCS")
				                            <td {{-- style="color: #FF0000;" --}}>SEGUIMIENTO-RECONSULTA</td>
				                        @elseif($consulta->tipo_consulta == "TCCI")
				                            <td>INTERCONSULTA-VALORACION</td>
				                        @endif
				                        <td>{{ $consulta->medico->personas->nombre }} {{ $consulta->medico->personas->ap_paterno }}</td>
				                        <td>{{ $consulta->motivo_consulta }}</td>               
				                        <td>
				                            <a href="{{ route('consulta.edit',$consulta->id_consulta) }}">Editar</a>
				                        </td>
				                    </tr>
				                    @endforeach
				                </tbody>
				        </table>
					</div>

				</div>
				<div class="row">
					<h3>Internaciones</h3>
				</div>

				<div class="row">
					<h3>Ordenes Pendientes</h3>
					<div class="table-responsive">
				        <table class="table table-bordered table-condensed tabla_small">
				            <thead>
				            		<th>Fecha</th>
				                    <th>Tipo</th>
				                    <th>Lugar</th>
				                    <th>Medico</th>
				                </thead>
				            <tbody>
				                    @foreach($persona->orden_internacion as $ordeni)
				                    <tr>
				                    	<td>{{ $ordeni->fecha_internacion->toDateString() }}</td>
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
				                        {{-- <td>
				                            <a href="{{ route('consulta.edit',$consulta->id_consulta) }}">Editar</a>
				                        </td> --}}
				                    </tr>
				                    @endforeach
				                </tbody>
				        </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection