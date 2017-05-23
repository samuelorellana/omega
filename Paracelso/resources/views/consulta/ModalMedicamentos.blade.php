<div class="modal fade" id="ModalMedicamentos" role="dialog" aria-labelledby="ModalAlergiasLabel">
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
							<span class="input-group-addon">Tipo</span>
							{!! Form::select('tipo_tratamiento',$tipoTratamiento,null,['id'=>'tipo_tratamiento','class'=>'form-control']) !!}
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Medicamento</span>
							<select class="form-control" id="codigo_medicamento" name="codigo_medicamento">
				            	@foreach ($medicamentos as $medicamento)
		                            <option value="{{ $medicamento->codigo_medicamento }}">{{ $medicamento->nombre_medico}}  [{{ $medicamento->nombre_comercial }}] - [{{ $medicamento->posologia }}] - [{{ $medicamento->presentacion }}]</option>
		                        @endforeach
			            	</select>
						</div>
					</div>

				    <div class="form-group">
				    	<div class="input-group">
				            <span class="input-group-addon">Indicaciones</span>
							{!! Form::text('prescripcion',null,['id'=>'prescripcion','class'=>'form-control','placeholder'=>'Indicaciones del tratamiento','onkeyup'=>'mayuscula(prescripcion)']) !!}
						</div>
					</div>
					
					{{-- <div class="form-group">
						{!! Form::hidden('fechaT',$fecha,['id'=>'fechaT','class'=>'form-control','placeholder'=>'Estado']) !!}
					</div> --}}

					<div class="form-group">
						{!! Form::hidden('estadoT','AC',['id'=>'estadoT','class'=>'form-control','placeholder'=>'Estado']) !!}
					</div>

					{!! link_to('#','Guardar',['id'=>'guardarT','class'=>'btn btn-primary btn-sm m-t-10']) !!}

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>