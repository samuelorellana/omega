<div class="container">
    <p><strong>Coincidencias Encontradas</strong></p>
</div>
<!-- Formulario de Listado de Persona -->

<div class="container">
    <div class="table-responsive">
    <div class="container-fluid">
        <table class="table table-bordered table-condensed tabla_small">
            <thead>
                <th>Paciente</th>
                <th>Edad</th>
                <th>Documento</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                @foreach($personas as $persona)
                <tr>
                    <td>{{ $persona->nombre }} {{ $persona->ap_paterno }} {{ $persona->ap_materno }}</td>
                    <td>{{ $persona->fecha_nacimiento->diffForHumans(null,true) }}</td>
                    <td>{{ $persona->documento_identidad }}</td>
                    <td><a href="{{ route('SeleccionarPersona',[$persona->id_persona]) }}"> Seleccionar </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {!! $personas->links() !!}
        </div>
    </div>
    </div>
</div>