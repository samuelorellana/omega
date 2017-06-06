<div class="table-responsive">
    <table class="table table-bordered table-condensed tabla_small table-fit">
        <thead>
            <th>Diagnostico</th>
            <th>Tipo</th>
            <th>Comentario</th>                
        </thead>
        <tbody>
            @foreach($diagnosticos as $diagnostico)
            <tr>
                <td>{{ $diagnostico->diagnostico }}</td>
                @if($diagnostico->agudo_cronico == "A")
                    <td>AGUDO</td>
                @elseif($diagnostico->agudo_cronico == "C")
                    <td>CRONICO</td>
                @endif
                <td>{{ $diagnostico->comentario }}</td>
                <!-- <td><a href="#" onclick="eliminarD('{ $diagnostico->id_diagnostico_historia}}','diagnosticosH','ListaDiagnosticos')"> [Eliminar]</a></td> -->
                <td><a href="#" onclick="eliminarD('{{ $diagnostico->id_diagnostico_historia}}')"> [Eliminar]</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>