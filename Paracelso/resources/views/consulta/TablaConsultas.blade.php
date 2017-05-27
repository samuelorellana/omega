<div class="table-responsive">
        <table class="table table-bordered table-condensed tabla_small">
            <thead>
                    <th>Hora</th>
                    <th>Tipo</th>
                    <th>Medico</th>
                    <th>Motivo</th>
                    <th>Historia</th>
                    <th>Opciones</th>
            </thead>
            <tbody>
                    @foreach($consultas as $consulta)
                        <tr>
                            <td>{{ $consulta->hora }}</td>
                            @if($consulta->tipo_consulta == "TCCN")
                                <td {{-- style="color: #009600;" --}}>NUEVA</td>
                            @elseif($consulta->tipo_consulta == "TCCS")
                                <td {{-- style="color: #FF0000;" --}}>SEGUIMIENTO-RECONSULTA</td>
                            @elseif($consulta->tipo_consulta == "TCCI")
                                <td>INTERCONSULTA-VALORACION</td>
                            @endif
                            <td>{{ $consulta->medico->personas->nombre }} {{ $consulta->medico->personas->ap_paterno }}</td>
                            <td>{{ $consulta->motivo_consulta }}</td>
                            <td>{{ $consulta->historia }}</td>                        
                            <td>
                                <a href="{{ route('consulta.edit',$consulta->id_consulta) }}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
</div>