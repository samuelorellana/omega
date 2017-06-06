<div class="container-fluid">
	<h3>Internaciones vigentes</h3>
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
	                	<td>{{ $internacion->ultimositio->tipo_unidad }}</td>
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
	                                       
	                </tr>
                @endforeach
            </tbody>
        </table>
	</div>
</div>