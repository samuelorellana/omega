<div class="table-responsive">
    <table class="table table-bordered table-condensed tabla_small table-fit">
        <thead>
            <th>Tipo</th>
            <th>Descripcion</th>                
        </thead>
        <tbody>
            @foreach($anamnesis as $anamnesia)
            <tr>
                <td>{{ $anamnesia->tipo }}</td>
                <td>{{ $anamnesia->descripcion }}</td>
                <!-- <td><a href="#" onclick="eliminarD('{ $diagnostico->id_diagnostico_historia}}','diagnosticosH','ListaDiagnosticos')"> [Eliminar]</a></td> -->
                <td><a href="#" onclick="eliminarAN('{{ $anamnesia->id_anamnesis_historia}}')"> [Eliminar]</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>