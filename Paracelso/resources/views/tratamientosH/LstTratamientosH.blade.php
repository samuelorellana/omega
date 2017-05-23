<div class="table-responsive">
    <table class="table table-bordered table-condensed tabla_small table-fit">
        <thead>
            <th>Tratamiento</th>
            <th>Causa</th>
            <th>Modo</th>                
        </thead>
        <tbody>
            @foreach($tratamientos as $tratamiento)
            <tr>
                <td>{{ $tratamiento->tratamiento }}</td>
                <td>{{ $tratamiento->causa_tratamiento }}</td>
                <td>{{ $tratamiento->modo_tratamiento }}</td>
                <!-- <td><a href="#" onclick="eliminarD('{ $diagnostico->id_diagnostico_historia}}','diagnosticosH','ListaDiagnosticos')"> [Eliminar]</a></td> -->
                <td><a href="#" onclick="eliminarT('{{ $tratamiento->id_tratamiento_historia}}')"> [Eliminar]</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>