<div class="container">
    <div class="table-responsive">
    <div class="container-fluid">
        <table class="table table-bordered table-condensed tabla_small table-fit">
            <thead>
                <th>Fecha</th>
                <th>Peso</th>
                <th>Talla</th>
                <th>P.Sistolica</th>
                <th>P.Diastolica</th>
                <th>F.Cardiaca</th>
                <th>F.Respiratoria</th>
                <th>Temperatura°C</th>
                <th>SPO2</th>
                <th>Dolor</th>
                <th>Obs</th>
            </thead>
            <tbody>
                @foreach($mediciones as $medicion)
                <tr>
                    <td>{{ $medicion->created_at->toDateTimeString() }}</td>
                    <td>{{ $medicion->peso}}</td>
                    <td>{{ $medicion->talla}}</td>
                    <td>{{ $medicion->presion_sistolica}}</td>
                    <td>{{ $medicion->presion_diastolica}}</td>
                    <td>{{ $medicion->frecuencia_cardiaca}}</td>
                    <td>{{ $medicion->frecuencia_respiratoria}}</td>
                    <td>{{ $medicion->temperatura}}</td>
                    <td>{{ $medicion->spo2}}</td>
                    <td>{{ $medicion->dolor}}</td>
                    <td>{{ $medicion->notas}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>