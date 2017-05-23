<div class="modal fade" id="ModalTratamientos" role="dialog" aria-labelledby="ModalTratamientosLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Ingresar Tratamiento</h3>
			</div>

			<div class="modal-body">
				{!! Form::open(['id'=>'formTratamiento']) !!}
					<div class="form-group">
						<div class="input-group">
		            	<span class="input-group-addon">Tratamiento</span>
		            		{!! Form::text('tratamiento',null,['id'=>'tratamiento','class'=>'form-control','placeholder'=>'Tratamiento/Terapia','onkeyup'=>'mayuscula(tratamiento)']) !!}
		            	</div>
					</div>

					<div class="form-group">
						<div class="input-group">
		            	<span class="input-group-addon">Diagnostico</span>
							{!! Form::text('causa_tratamiento',null,['id'=>'causa_tratamiento','class'=>'form-control','placeholder'=>'Diagnostico/Causal','onkeyup'=>'mayuscula(causa_tratamiento)']) !!}					
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
		            	<span class="input-group-addon">Como lo recibe</span>
							{!! Form::text('modo_tratamiento',null,['id'=>'modo_tratamiento','class'=>'form-control','placeholder'=>'Como lo recibe','onkeyup'=>'mayuscula(modo_tratamiento)']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::hidden('estadoT','AC',['id'=>'estadoT','class'=>'form-control','placeholder'=>'Estado']) !!}					
					</div>

					{!! link_to('#','Guardar',['id'=>'guardarTratamiento','class'=>'btn btn-primary btn-sm m-t-10']) !!}

					
	        	{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>