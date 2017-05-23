<div class="modal fade" id="ModalAlergias" role="dialog" aria-labelledby="ModalAlergiasLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Ingresar Alergia</h3>
			</div>

			<div class="modal-body">
				<!-- Errores -->
				{!! Form::open(['id'=>'formAlergia']) !!}

				    <div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Tipo de Alergia</span>
							{!! Form::select('tipo_alergia',$tipoAlergia,null,['id'=>'tipo_alergia','class'=>'form-control']) !!}
						</div>
					</div>

				    <div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Grado Severidad</span>
							<select class="form-control" id="severidad">
								<option value="Muy Severo">Muy Severo</option>
		                        <option value="Severo">Severo</option>
		                        <option value="Moderado">Moderado</option>
		                        <option value="Leve">Leve</option>
							</select>
						</div>
				    </div>

				    <div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Ag.Causal</span>
							{!! Form::text('agente',null,['id'=>'agente','class'=>'form-control','placeholder'=>'Agente Causal','onkeyup'=>'mayuscula(agente)']) !!}
						</div>							
					</div>

					<div class="form-group">
						{!! Form::hidden('estadoA','AC',['id'=>'estadoA','class'=>'form-control','placeholder'=>'Estado']) !!}
					</div>

					{{-- {!! Form::submit('guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>guardar</span>','class'=>'btn btn-warning btn-sm m-t-10']) !!} --}}
					{!! link_to('#','Guardar',['id'=>'guardarAlergia','class'=>'btn btn-primary']) !!}

					{{-- <div class="container" id="ListaAlergias">
		            	RESULTADO DE LA BUSQUEDA LstAlergias 
		        	</div> --}}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>