@extends('layouts.loginbody')

@section('content')
<div class="container" id="centro">
<section>
     
            <div class="panel panel-default" id="form_login">                
                <div class="panel-body">
                    <h4>Control de Acceso</h4>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-xs-3 col-sm-3 col-md-4 control-label">Usuario</label>

                            <div class="col-xs-9 col-sm-9 col-md-8">
                                <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="Usuario">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-xs-3 col-sm-3 col-md-4 control-label">Contraseña</label>

                            <div class="col-xs-9 col-sm-9 col-md-8">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Ingresar
                                </button>

                                {{-- <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        
</section>   
</div>
@endsection