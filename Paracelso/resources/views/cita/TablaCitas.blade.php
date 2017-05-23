<div class="table-responsive">
        <table class="table table-bordered table-condensed tabla_small">
            <thead>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Paciente</th>
                    <th>Motivo</th>
                    <th>Medico</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </thead>
            <tbody>
                    @foreach($citas as $cita)
                    <tr>
                        <td>{{ $cita->fecha->format('d-m-Y')}}</td>
                        <td>{{ $cita->hora }}</td>
                        <td>{{ $cita->personas->nombre}} {{ $cita->personas->ap_paterno}}</td>
                        <td>{{ $cita->motivo}}</td>
                        <td>{{ $cita->medicos->personas->nombre }} {{ $cita->medicos->personas->ap_paterno }}</td> 
                        @if($cita->estado == "TCEP")
                            <td {{-- style="color: #009600;" --}}>PENDIENTE</td>
                        @elseif($cita->estado == "TCEC")
                            <td {{-- style="color: #FF0000;" --}}>CANCELADA</td>
                        @elseif($cita->estado == "TCER")
                            <td>REALIZADA</td>
                        @endif
                        <td>
                            <a href="{{ route('cita.edit',$cita->id_cita) }}">Editar</a>
                            {{-- <a href="#" onClick="eliminar('{{ $cita->id_cita }}')">Cancelar Cita</a> --}}
                            <a href="{{ url('/CancelarCita',[$cita->id_cita]) }}">Cancelar</a>
                            {{-- <a href="{{ url('/SeleccionarPersona', [$cita->personas->id_persona,'100']) }}">Seleccionar </a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
</div>