<div class="table-responsive">
    <table class="table table-bordered table-condensed tabla_small table-fit">
        <thead>
            <th>Tipo</th>
            <th>Descripcion</th>                
        </thead>
        <tbody>
            @foreach($antecedentes as $antecedente)
            <tr>
                @if($antecedente->tipo_antecedente == "TAHP")
                    <td>PATOLOGICO</td>
                @elseif($antecedente->tipo_antecedente == "TAHF")
                    <td>FAMILIAR</td>
                @elseif($antecedente->tipo_antecedente == "TAHQ")
                    <td>QUIRURGICO</td>
                @elseif($antecedente->tipo_antecedente == "TAHO")
                    <td>OTRO TIPO</td>
                @endif
                <td>{{ $antecedente->descripcion }}</td>
                <!-- <td><a href="#" onclick="eliminarN('{ $antecedente->id_antecedente_historia}}','antecedentesH','ListaAntecedentes')"> [Eliminar]</a></td> -->
                <td><a href="#" onclick="eliminarN('{{ $antecedente->id_antecedente_historia}}')"> [Eliminar]</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>