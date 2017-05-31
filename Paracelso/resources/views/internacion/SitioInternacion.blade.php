<div class="row container-fluid">
			<div><span style="float: right;"><small>Fecha y Hora de Evolucion : {{ $fecha->toDateTimeString() }}</small></span> <h4>Unidad - Piso - Cama</h4> </div>
			
	{!! Form::open(['id'=>'formSitioI']) !!}
		{{-- <div class="row"> --}}
			<div class="form-group">
				{!! Form::hidden('unidad',$codigoUnidad,['id'=>'unidad','class'=>'form-control','placeholder'=>'Estado']) !!}
			</div>
			<div class="form-group">
				{!! Form::hidden('id_internacion',$id_internacion,['id'=>'id_internacion','class'=>'form-control','placeholder'=>'Estado']) !!}
			</div>
			<div class="form-group">
				{!! Form::hidden('id_medico',$id_medico,['id'=>'id_medico','class'=>'form-control','placeholder'=>'Estado']) !!}
			</div>
			
			<div class="form-group col-sm-4 col-md-4">
				
				<div class="input-group">
					@unless($codigoUnidad->isEmpty())
						<span class="input-group-addon">Origen :{{ $codigoUnidad }} >> Destino:</span>
					@else
						<span class="input-group-addon">Unidad :</span>
					@endunless
					
					{!! Form::select('tipo_unidad',$tipoUnidad,null,['id'=>'tipo_unidad','class'=>'form-control']) !!}
				</div>
			</div>

			<div class="form-group col-sm-4 col-md-4">
		    	<div class="input-group">
		            <span class="input-group-addon">Piso</span>
					{!! Form::text('piso',null,['id'=>'piso','class'=>'form-control','placeholder'=>'Piso','onkeyup'=>'mayuscula(piso)']) !!}
				</div>
			</div>

			<div class="form-group col-sm-4 col-md-4">
		    	<div class="input-group">
		            <span class="input-group-addon">Cama</span>
					{!! Form::text('cama',null,['id'=>'cama','class'=>'form-control','placeholder'=>'Cama','onkeyup'=>'mayuscula(cama)']) !!}
				</div>
			</div>

			<div class="form-group">
				{!! Form::hidden('fecha_hora',$fecha,['id'=>'fecha_hora','class'=>'form-control','placeholder'=>'fecha']) !!}
			</div>

			<div class="form-group">
				{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
			</div>

			<div class="form-group col-sm-10 col-md-10">
		    	<div class="input-group">
		            <span class="input-group-addon">Notas</span>
					{!! Form::text('notas',null,['id'=>'notas','class'=>'form-control','placeholder'=>'Notas adicionales','onkeyup'=>'mayuscula(notas)']) !!}
				</div>
			</div>					

			<div class="form-group col-sm-2 col-md-2">
				{!! link_to('#','Guardar',['id'=>'guardarSitio','class'=>'btn btn-primary']) !!}
			</div>

	{!! Form::close() !!}
</div>