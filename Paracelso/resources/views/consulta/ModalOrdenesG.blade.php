<div class="modal fade" id="ModalOrdenesG" role="dialog" aria-labelledby="ModalAlergiasLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Ingresar Orden de Gabinete</h3>
			</div>

			<div class="modal-body">
				{!! Form::open(['id'=>'formOrdenG']) !!}
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Gabinete</span>
							{!! Form::select('tipo_gabinete',$tipoGabinete,null,['id'=>'tipo_gabinete','class'=>'form-control']) !!}
						</div>
					</div>

					<div class="form-group">
				    	<div class="input-group input-group-sm">
				            <span class="input-group-addon">Descripcion</span>
							{!! Form::text('complemento',null,['id'=>'complemento','class'=>'form-control','placeholder'=>'Complemento del examen (cabeza, cuello, torax, etc... con/sin contraste...)','onkeyup'=>'mayuscula(complemento)']) !!}
						</div>
					</div>

					<div class="form-group">
				    	<div class="input-group input-group-sm">
				            <span class="input-group-addon">Indicaciones</span>
							{!! Form::text('orden',null,['id'=>'orden','class'=>'form-control','placeholder'=>'Indicaciones para el examen','onkeyup'=>'mayuscula(orden)']) !!}
						</div>
					</div>

					<div class="form-group">
				    	<div class="input-group input-group-sm">
				            <span class="input-group-addon">Fecha.Prog.</span>
							{!! Form::input('date','fecha_hora',null,['id'=>'fecha_hora','class'=>'form-control','placeholder'=>'dd-mm-aaaa']) !!}
						</div>
					</div>
					
					<div class="form-group">
						{!! Form::hidden('estadoOG','AC',['id'=>'estadoOG','class'=>'form-control','placeholder'=>'Estado']) !!}
					</div>

					<div class="form-group">
						<div class="checkbox">
							<label for="">
								<input type="checkbox" name="urgenteG" id="urgenteG"> Urgente!
							</label>
						</div>
					</div>


					{!! link_to('#','guardar...',['id'=>'guardarG','class'=>'btn btn-primary btn-sm m-t-10']) !!}
					
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>