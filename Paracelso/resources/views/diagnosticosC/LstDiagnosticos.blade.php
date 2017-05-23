<div class="table-responsive">
    <table class="table table-bordered table-condensed tabla_small table-fit">
        <thead>
            <th>Tipo</th>
            <th>Diagnostico</th>                
        </thead>
        <tbody>
            @foreach($diagnosticos as $diagnostico)
            <tr>
                @if($diagnostico->tipo_diagnostico == "TDMD")
                    <td>CLINICO/MEDICO</td>
                @elseif($diagnostico->tipo_diagnostico == "TDQX")
                    <td>QUIRURGICO</td>
                @endif
                <td>{{ $diagnostico->descripcion }}</td>
                <!-- <td><a href="#" onclick="eliminarD('{ $diagnostico->id_diagnostico_historia}}','diagnosticosH','ListaDiagnosticos')"> [Eliminar]</a></td> -->
                <td><a href="#" onclick="eliminarD('{{ $diagnostico->id_diagnostico_consulta}}')"> [Eliminar]</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>