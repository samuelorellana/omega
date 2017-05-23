<div class="container">
	<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<th>Nombre</th>
				<th>Codigo</th>
				<th>Descripcion</th>
			</thead>
			<tbody>
				@foreach($lista as $lis)
				<tr>
					<td>{{ $lis->nombre }}</td>
					<td>{{ $lis->codigo_dominio }}</td>
					<td>{{ $lis->descripcion }}</td>
				</tr>							
				@endforeach
			</tbody>
		</table>
	</div>
</div>