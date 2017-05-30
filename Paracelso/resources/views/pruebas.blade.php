@extends('layouts.app1')

@section('content')
<div class="container marco_trabajo">
	{!! Form::open() !!}
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">Medicos</span>
				{!! Form::select('medico',$personal,null,['id'=>'medico','class'=>'form-control','onkeyup'=>'mayuscula(tipo_seguro)']) !!}
			</div>
		</div>
	{!! Form::close() !!}
</div>
@endsection