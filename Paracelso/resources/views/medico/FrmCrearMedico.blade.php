@extends('layouts.app1')
@section('content')

<!-- Titulo de Menu -->
<div class="container-fluid marco_trabajo">
    <h3><strong>Datos de Medico para:</strong></h3>
    @include('persona.LstDatosBasicosA')
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

            	@include('Errores')
            	
                <div class="panel-heading">Registro de Medico</div>
                <div class="panel-body">
                    {!! Form::open(['route'=>'medico.store','method'=>'POST','role'=>'form']) !!}
						
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Especialidad</span>
								{!! Form::select('codigo_especialidad',$tipoEspecialidad,null,['id'=>'codigo_especialidad','class'=>'form-control']) !!}
							</div>
						</div>

                    	<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Matricula Min. Salud</span>
								{!! Form::text('matricula_min_salud',null,['id'=>'matricula_min_salud','class'=>'form-control','placeholder'=>'Matricula Min. Salud','onkeyup'=>'mayuscula(matricula_min_salud)']) !!}
							</div>													
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Matricula Col. Medico</span>
								{!! Form::text('matricula_col_medico',null,['id'=>'matricula_col_medico','class'=>'form-control','placeholder'=>'Matricula Col. Medico','onkeyup'=>'mayuscula(matricula_col_medico)']) !!}
							</div>													
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Ranking</span>
								{!! Form::number('ranking',0,['id'=>'ranking','class'=>'form-control','placeholder'=>'Ranking','onkeyup'=>'mayuscula(ranking)']) !!}
							</div>													
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Alma Mater</span>
								{!! Form::text('alma_mater',null,['id'=>'alma_mater','class'=>'form-control','placeholder'=>'Alma Mater','onkeyup'=>'mayuscula(alma_mater)']) !!}
							</div>													
						</div>

						<div class="form-group">
							{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
						</div>

						{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-primary btn-sm m-t-10']) !!}
					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection