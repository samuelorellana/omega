<div class="modal fade" id="ModalDiagnosticos" role="dialog" aria-labelledby="ModalAlergiasLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Ingresar Diagnostico de la Consulta</h3>
			</div>

			<div class="modal-body">
				{!! Form::open(['id'=>'formDiagnostico']) !!}
		        	<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Tipo</span>
							{!! Form::select('tipo_diagnostico',$tipoDiagnostico,null,['id'=>'tipo_diagnostico','class'=>'form-control']) !!}
						</div>
					</div>

				    <div class="form-group">
				    	<div class="input-group">
				            <span class="input-group-addon">Diag. Propio</span>
							{!! Form::text('descripcion',null,['id'=>'descripcion','class'=>'form-control','placeholder'=>'Diagnostico Propio','onkeyup'=>'mayuscula(descripcion)']) !!}
						</div>
					</div>

					<div class="form-group">
						{!! Form::hidden('estadoD','AC',['id'=>'estadoD','class'=>'form-control','placeholder'=>'Estado']) !!}
					</div>

					{!! link_to('#','Guardar',['id'=>'guardarD','class'=>'btn btn-primary btn-sm m-t-10']) !!}
					
			    {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>