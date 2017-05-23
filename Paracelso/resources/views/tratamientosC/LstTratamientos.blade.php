<div class="table-responsive">
    <table class="table table-bordered table-condensed tabla_small table-fit">
        <thead>
            <th>Tipo</th>
            <th>Medicamento</th>                
            <th>Prescripcion</th>
        </thead>
        <tbody>
            @foreach($tratamientos as $tratamiento)
            <tr>
                @if($tratamiento->tipo_tratamiento == "TTTF")
                    <td>FARMACOLOGICO</td>
                @elseif($tratamiento->tipo_tratamiento == "TTNF")
                    <td>NO FARMACOLOGICO</td>
                @elseif($tratamiento->tipo_tratamiento == "TTHC")
                    <td>HIGIENE/CONDUCTA</td>
                @elseif($tratamiento->tipo_tratamiento == "TTOT")
                    <td>OTRO TIPO</td>
                @endif
                <td>{{ $tratamiento->codigo_medicamento }}</td>
                <td>{{ $tratamiento->prescripcion }}</td>
                <!-- <td><a href="#" onclick="eliminar('{ $tratamiento->id_tratamiento_historia}}','tratamientosH','ListaTratamientos')"> [Eliminar]</a></td> -->
                <td><a href="#" onclick="eliminarT('{{ $tratamiento->id_tratamiento_consulta}}')"> [Eliminar]</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>