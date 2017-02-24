@extends('layouts.blank')

@section('title')
    Actualizar Perfil
@endsection

@section('content')

<div class="form-group col-sm-3 col-xs-12">
    <img  width="200" height="200" align="middle" src="{{ asset('img/selene.jpg') }}"/>
</div>

<div class="form-group col-sm-9">
    <div class="form-group col-sm-6 col-xs-12">
        <label for="nombre">Nombre:</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-plus-circle"></i></span>
        <input class="form-control" type="text" name="razon_social" placeholder="Razon Social" id="razon_social" value="{{$datosGenerales->razon_social}}">
        </div>
    </div>

    <div class="form-group col-sm-6 col-xs-12">
        <label for="rfc">Email:</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-adjust"></i></span>
        <input class="form-control" type="text" name="email" id="email" placeholder="ejemplo@email.com" value="{{ $datosGenerales->email }}">
        </div>
    </div>

    <div class="form-group col-sm-6 col-xs-12">
        <label for="rfc">Password:</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-adjust"></i></span>
        <input class="form-control" type="text" name="password" id="password" placeholder="Password" value"">
        </div>
    </div>

    <div class="form-group col-sm-6 col-xs-12">
        <label for="rfc">RFC:</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-adjust"></i></span>
        <input class="form-control" type="text" name="rfc" id="rfc" placeholder="RFC" value="{{$datosGenerales->rfc }}">
        </div>
    </div>

    <div class="form-group col-sm-6 col-xs-12">
        <label for="rfc">Direcci&oacute;n:</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-adjust"></i></span>
        <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direcci&oacute;n" value="{{ $datosGenerales->direccion }}">
        </div>
    </div>

    <div class="form-group col-sm-6 col-xs-12">
        <label for="rfc">Key:</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-adjust"></i></span>
        <input class="form-control" type="text" name="key" id="key" placeholder="Key" value="{{ $perfil->key }}">
        </div>
    </div>

    <div class="form-group col-sm-6 col-xs-12">
        <label for="rfc">Cer:</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-adjust"></i></span>
        <input class="form-control" type="text" name="cer" id="cer" placeholder="Cer" value="{{ $perfil->cer }}">
        </div>
</div>

<div class="col-xs-12 col-sm-offset-3 col-sm-6">
  <button class="btn btn-primary btn-block">Actualizar</button>
</div>


@endsection