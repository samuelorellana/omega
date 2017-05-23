<div class="table-responsive">
    <table class="table table-bordered table-condensed tabla_small table-fit">
        <thead>
            <th>Tipo</th>
            <th>Severidad</th>
            <th>Agente</th>                
        </thead>
        <tbody>
            @foreach($alergias as $alergia)
            <tr>
                @if($alergia->tipo_alergia == "TAAL")
                    <td>ALIMENTARIA</td>
                @elseif($alergia->tipo_alergia == "TAAM")
                    <td>MEDICAMENTOSA</td>
                @elseif($alergia->tipo_alergia == "TAAA")
                    <td>AMBIENTAL</td>
                @endif
                
                <td>{{ $alergia->severidad }}</td>
                <td>{{ $alergia->agente }}</td>
                <!-- <td><a href="#" onclick="eliminar('{ $alergia->id_alergia}}','alergia','ListaAlergias')"> [Eliminar]</a></td> -->
                <td><a href="#" onclick="eliminarA('{{ $alergia->id_alergia}}')"> [Eliminar]</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>