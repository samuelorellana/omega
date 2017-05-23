<div class="container">
	{!! Form::open() !!}
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">medicos</span>
				{!! Form::select('tipo_documento',$nombres,null,['id'=>'tipo_documento','class'=>'form-control','onkeyup'=>'mayuscula(tipo_seguro)']) !!}
			</div>
		</div>
	{!! Form::close() !!}
</div>