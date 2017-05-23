<div class="container">
	<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<th>Tipo de Seguro</th>
				<th>Nombre</th>
			</thead>
			<tbody>
				@foreach($lista as $lis)
				<tr>
					<td>{{ $lis->tipo_seguro }}</td>
					<td>{{ $lis->nombre }}</td>
				</tr>							
				@endforeach
			</tbody>
		</table>
	</div>
</div>