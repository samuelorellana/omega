<div class="container">
	<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<th>Nombres y Apellidos</th>
				{{-- <th>Especialidad</th> --}}
				<th>Matricula MS</th>
				<th>Matricula CM</th>
				<th>Opciones</th>
			</thead>
			<tbody>
				@foreach($medicos as $medico)
				<tr>
					<td>{{ $medico->personas->nombre }} {{ $medico->personas->ap_paterno }} {{ $medico->personas->ap_materno }}</td>
					{{-- <td>{{ $medico->codigo_especialidad }}</td> --}}
					<td>{{ $medico->matricula_min_salud }}</td>
					<td>{{ $medico->matricula_col_medico }}</td>
					<td><a href="{{ route('medico.edit',$medico->id_medico) }}">Editar datos</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>