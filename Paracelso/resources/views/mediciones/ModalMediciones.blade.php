<div class="modal fade" id="ModalMediciones" role="dialog" aria-labelledby="ModalMedicionesLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Registro de signos Vitales</h3>
			</div>

			<div class="modal-body">
				{!! Form::open(['route'=>'medicion.store','method'=>'POST']) !!}

		            <div class="form-group col-xs-6 col-sm-6 col-md-6">
				        <span class="input-group-addon">Fecha: {{ $fecha->toDateString() }}</span>				        
				    </div>

				    <div class="form-group col-xs-6 col-sm-6 col-md-6">
				        <div class="input-group">
				            <span class="input-group-addon">Glasgow</span>
				            {!! Form::number('glasgow',null,['id'=>'glasgow','class'=>'form-control','placeholder'=>'Glasgow entre 3-15']) !!}
				        </div>
				    </div>

				    <div class="form-group col-xs-6 col-sm-6 col-md-6">
				        <div class="input-group">
				            <span class="input-group-addon">Peso</span>
				            {!! Form::number('peso',null,['id'=>'peso','class'=>'form-control','placeholder'=>'Peso en kilogramos, ej:8.1']) !!}
				        </div>
				    </div>

				    <div class="form-group col-xs-6 col-sm-6 col-md-6">
				        <div class="input-group">
				            <span class="input-group-addon">Talla</span>
				            {!! Form::number('talla',null,['id'=>'talla','class'=>'form-control','placeholder'=>'Talla en centimetros']) !!}
				        </div>
				    </div>
				    
				    <div class="form-group col-xs-6 col-sm-6 col-md-6">
				        <div class="input-group">
				            <span class="input-group-addon">P. Sistolica</span>
				            {!! Form::number('presion_sistolica',null,['id'=>'presion_sistolica','class'=>'form-control','placeholder'=>'PAS']) !!}
				        </div>
				    </div>
				    <div class="form-group col-xs-6 col-sm-6 col-md-6">
				        <div class="input-group">
				            <span class="input-group-addon">P. Diastolica</span>
				            {!! Form::number('presion_diastolica',null,['id'=>'presion_diastolica','class'=>'form-control','placeholder'=>'PAD']) !!}
				        </div>
				    </div>
				    <div class="form-group col-xs-6 col-sm-6 col-md-6">
				        <div class="input-group">
				            <span class="input-group-addon">F. Cardiaca</span>
				            {!! Form::number('frecuencia_cardiaca',null,['id'=>'frecuencia_cardiaca','class'=>'form-control','placeholder'=>'FC']) !!}
				        </div>
				    </div>
				    <div class="form-group col-xs-6 col-sm-6 col-md-6">
				        <div class="input-group">
				            <span class="input-group-addon">F. Respiratoria</span>
				            {!! Form::number('frecuencia_respiratoria',null,['id'=>'frecuencia_respiratoria','class'=>'form-control','placeholder'=>'FR']) !!}
				        </div>
				    </div>
				    <div class="form-group col-xs-6 col-sm-6 col-md-6">
				        <div class="input-group">
				            <span class="input-group-addon">Temp. (°C)</span>
				            {!! Form::number('temperatura',null,['id'=>'temperatura','class'=>'form-control','placeholder'=>'Temperatura en centigrados ej:37.5']) !!}
				        </div>
				    </div>
				    <div class="form-group col-xs-6 col-sm-6 col-md-6">
				        <div class="input-group">
				            <span class="input-group-addon">SPO2(%)</span>
				            {!! Form::number('spo2',null,['id'=>'spo2','class'=>'form-control','placeholder'=>'SPO2 en %']) !!}
				        </div>
				    </div>
				    <div class="form-group col-xs-6 col-sm-6 col-md-6">
				        <div class="input-group">
				            <span class="input-group-addon">Dolor(1-10)</span>
				            {!! Form::number('dolor',null,['id'=>'dolor','class'=>'form-control','placeholder'=>'EAV entre 0-10']) !!}
				        </div>
				    </div>

				    <div class="form-group col-xs-6 col-sm-6 col-md-6">
				        <div class="input-group">
				            <span class="input-group-addon">Notas</span>
				            {!! Form::text('notas',null,['id'=>'notas','class'=>'form-control','placeholder'=>'Observaciones','onkeyup'=>'mayuscula(notas)']) !!}
				        </div>
				    </div>

				    <div class="form-group">
						{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
					</div>
					<!-- </form> -->
					{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','class'=>'btn btn-info btn-sm m-t-10']) !!}

				{!! Form::close() !!}
					<!-- Fin de formulario de registro de signos vitales -->
			</div>
		</div>
	</div>
</div>