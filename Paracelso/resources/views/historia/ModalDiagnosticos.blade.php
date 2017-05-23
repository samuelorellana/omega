<div class="modal fade" id="ModalDiagnosticos" role="dialog" aria-labelledby="ModalDiagnosticosLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Ingresar Diagnostico</h3>
			</div>

			<div class="modal-body">
				{!! Form::open(['id'=>'formDiagnostico']) !!}

					<div class="form-group">
						<div class="input-group">
			            	<span class="input-group-addon">Diag.Propio</span>
							{!! Form::text('diagnostico',null,['id'=>'diagnostico','class'=>'form-control','placeholder'=>'Diagnostico propio','onkeyup'=>'mayuscula(diagnostico)']) !!}
						</div>
					</div>
					
			    	{{-- <div class="form-group">
						<div class="input-group">
			            	<span class="input-group-addon">Diag CIE10</span>
							{!! Form::text('diagnostico_cie10',null,['id'=>'diagnostico_cie10','class'=>'form-control','placeholder'=>'codigo - Diagnostico CIE 10','onkeyup'=>'mayuscula(diagnostico_cie10)']) !!}						
						</div>
					</div> --}}

					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Tipo Diagnostico</span>
							<select class="form-control" id="agudo_cronico">
								<option value="A">Agudo</option>
		                        <option value="C">Cronico</option>
							</select>
						</div>
				    </div>

				    <div class="form-group">
						<div class="input-group">
			            	<span class="input-group-addon">Comentarios</span>
							{!! Form::text('comentarios',null,['id'=>'comentarios','class'=>'form-control','placeholder'=>'Comentarios','onkeyup'=>'mayuscula(comentarios)']) !!}
						</div>						
					</div>

					<div class="form-group">
						{!! Form::hidden('estadoD','AC',['id'=>'estadoD','class'=>'form-control','placeholder'=>'Estado']) !!}
					</div>

					{{-- {!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-warning btn-sm m-t-10']) !!} --}}
					{!! link_to('#','Guardar',['id'=>'guardarDiagnostico','class'=>'btn btn-primary btn-sm m-t-10']) !!}

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>