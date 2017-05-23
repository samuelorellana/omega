<div class="modal fade" id="ModalAntecedentes" role="dialog" aria-labelledby="ModalAntecedentesLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Ingresar Antecedente</h3>
			</div>

			<div class="modal-body">
				{!! Form::open(['id'=>'formAntecedentes']) !!}

					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Tipo de Antecedente</span>
							{!! Form::select('tipo_antecedente',$tipoAntecedente,null,['id'=>'tipo_antecedente','class'=>'form-control']) !!}
						</div>
					</div>
					
					<div class="form-group">
						<div class="input-group">
		            	<span class="input-group-addon">Descripcion</span>
							{!! Form::text('descripcion',null,['id'=>'descripcion','class'=>'form-control','placeholder'=>'Descripcion del antecedente','onkeyup'=>'mayuscula(descripcion)']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::hidden('estadoN','AC',['id'=>'estadoN','class'=>'form-control','placeholder'=>'Estado']) !!}					
					</div>

					{!! link_to('#','Guardar',['id'=>'guardarAntecedente','class'=>'btn btn-primary btn-sm m-t-10']) !!}

					

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>