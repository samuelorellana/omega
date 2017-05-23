<div class="modal fade" id="ModalHabitos" role="dialog" aria-labelledby="ModalHabitosLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Ingresar Habito Personal</h3>
			</div>

			<div class="modal-body">
				{!! Form::open(['id'=>'formNopatologicos']) !!}
					<div class="form-group">
						<div class="input-group">
		            	<span class="input-group-addon">Tipo hábito</span>
							{!! Form::text('tipo_habito',null,['id'=>'tipo_habito','class'=>'form-control','placeholder'=>'Tipo de Habito/Ant. NO patologico','onkeyup'=>'mayuscula(tipo_habito)']) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
		            	<span class="input-group-addon">Descripcion</span>
							{!! Form::text('descripcionh',null,['id'=>'descripcionh','class'=>'form-control','placeholder'=>'Descripcion...','onkeyup'=>'mayuscula(descripcionh)']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::hidden('estadoNP','AC',['id'=>'estadoNP','class'=>'form-control','placeholder'=>'Estado']) !!}					
					</div>

					{!! link_to('#','Guardar',['id'=>'guardarHabitos','class'=>'btn btn-primary btn-sm m-t-10']) !!}

					
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>