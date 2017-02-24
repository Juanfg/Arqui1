@extends('layouts.blank')

@section('title')
    Login
@endsection

@section('content')
<div class="container">
    <div class="col-md-4">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Log Me In </a>&nbsp;
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-6">
        <div class="alert alert-success">
            <strong>Conocenos m&aacute;s:</strong>
            <p>Factura Online tiene para ti y tu negocio Sistemas de Facturación Electr&oacute;nica a la medida de tus necesidades. Consulta nuestras diferentes soluciones y precios, y toma la mejor decisi&oacute;n.
            </p><br>
            <strong><a href="{{ route('register') }}">Registrate Aqu&iacute;</a></strong>
        </div>
    </div>
</div>
@endsection
