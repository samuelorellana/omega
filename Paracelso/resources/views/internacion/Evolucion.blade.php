<div class="row container-fluid">
	<h4>Evolucion</h4>
	<div class="panel panel-default disabledTab" id="pnlEvolucion">
		<div class="panel-body">
			{!! Form::open(['id'=>'formEvolucion']) !!}
				<div class="form-group">
					{!! Form::hidden('id_internacion',$id_internacion,['id'=>'id_internacion','class'=>'form-control','placeholder'=>'Estado']) !!}
				</div>
											
				<div class="row">
					<div class="form-group col-sm-6 col-md-6">
						<div class="input-group">
							<span class="input-group-addon">Medico</span>
							{!! Form::select('id_medico',$medicos,$id_medico,['id'=>'id_medico','class'=>'form-control']) !!}
						</div>
					</div>

					<div class="form-group col-sm-6 col-md-6">
						<div class="input-group">
							<span class="input-group-addon">Tipo Nota</span>
							{!! Form::select('tipo_evolucion',$tipoEvolucion,null,['id'=>'tipo_evolucion','class'=>'form-control']) !!}
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-sm-3 col-md-3">
				    	<div class="input-group">
				            <span class="input-group-addon">Peso</span>
							{!! Form::text('peso',null,['id'=>'peso','class'=>'form-control','placeholder'=>'Peso','onkeyup'=>'mayuscula(motivo_consulta)']) !!}
						</div>
					</div>

					<div class="form-group col-sm-3 col-md-3">
				    	<div class="input-group">
				            <span class="input-group-addon">Talla</span>
							{!! Form::text('talla',null,['id'=>'talla','class'=>'form-control','placeholder'=>'Talla','onkeyup'=>'mayuscula(historia)']) !!}
						</div>
					</div>

					<div class="form-group col-sm-3 col-md-3">
				    	<div class="input-group">
				            <span class="input-group-addon">Glasgow</span>
							{!! Form::text('glasgow',null,['id'=>'glasgow','class'=>'form-control','placeholder'=>'Glasgow','onkeyup'=>'mayuscula(motivo_consulta)']) !!}
						</div>
					</div>

					<div class="form-group col-sm-3 col-md-3">
				    	<div class="input-group">
				            <span class="input-group-addon">Temp.</span>
							{!! Form::text('temperatura',null,['id'=>'temperatura','class'=>'form-control','placeholder'=>'Temperatura','onkeyup'=>'mayuscula(temperatura)']) !!}
						</div>
					</div>

					<div class="form-group col-sm-3 col-md-3">
				    	<div class="input-group">
				            <span class="input-group-addon">FC</span>
							{!! Form::text('frecuencia_cardiaca',null,['id'=>'frecuencia_cardiaca','class'=>'form-control','placeholder'=>'FC','onkeyup'=>'mayuscula(frecuencia_cardiaca)']) !!}
						</div>
					</div>

					<div class="form-group col-sm-3 col-md-3">
				    	<div class="input-group">
				            <span class="input-group-addon">FR</span>
							{!! Form::text('frecuencia_respiratoria',null,['id'=>'frecuencia_respiratoria','class'=>'form-control','placeholder'=>'FR','onkeyup'=>'mayuscula(frecuencia_respiratoria)']) !!}
						</div>
					</div>

					<div class="form-group col-sm-3 col-md-3">
				    	<div class="input-group">
				            <span class="input-group-addon">PAS</span>
							{!! Form::text('presion_sistolica',null,['id'=>'presion_sistolica','class'=>'form-control','placeholder'=>'PAS','onkeyup'=>'mayuscula(presion_sistolica)']) !!}
						</div>
					</div>

					<div class="form-group col-sm-3 col-md-3">
				    	<div class="input-group">
				            <span class="input-group-addon">PAD</span>
							{!! Form::text('presion_diastolica',null,['id'=>'presion_diastolica','class'=>'form-control','placeholder'=>'PAD','onkeyup'=>'mayuscula(presion_diastolica)']) !!}
						</div>
					</div>

					<div class="form-group col-sm-12 col-md-12">
				    	<div class="input-group">
				            <span class="input-group-addon">Subjetivo</span>
							{!! Form::text('subjetivo',null,['id'=>'subjetivo','class'=>'form-control','placeholder'=>'Evaluacion subjetiva','onkeyup'=>'mayuscula(subjetivo)']) !!}
						</div>
					</div>

					<div class="form-group col-sm-12 col-md-12">
				    	<div class="input-group">
				            <span class="input-group-addon">Objetivo</span>
							{!! Form::text('objetivo',null,['id'=>'objetivo','class'=>'form-control','placeholder'=>'Evaluacion objetiva','onkeyup'=>'mayuscula(objetivo)']) !!}
						</div>
					</div>

					<div class="form-group col-sm-12 col-md-12">
				    	<div class="input-group">
				            <span class="input-group-addon">Plan</span>
							{!! Form::text('plan',null,['id'=>'plan','class'=>'form-control','placeholder'=>'Plan para el paciente','onkeyup'=>'mayuscula(plan)']) !!}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-sm-6 col-md-6">
						<div class="input-group">
							<span class="input-group-addon">Tipo de Conducta a Seguir</span>
							{!! Form::select('tipo_conducta',$tipoConducta,null,['id'=>'tipo_conducta','class'=>'form-control']) !!}
						</div>
					</div>

					<div class="form-group">
						{!! Form::hidden('fecha_hora',$fecha,['id'=>'fecha_hora','class'=>'form-control','placeholder'=>'fecha']) !!}
					</div>

					<div class="form-group">
						{!! Form::hidden('estadoE','AC',['id'=>'estadoE','class'=>'form-control','placeholder'=>'Estado']) !!}
					</div>

					<div class="form-group col-sm-6 col-md-6">
						{!! link_to('#','Guardar',['id'=>'guardarEvolucion','class'=>'btn btn-primary']) !!}
					</div>
				</div>		
				
			{!! Form::close() !!}
		</div>
	</div>
</div>