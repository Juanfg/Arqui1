@extends('layouts.blank')

@section('content')

@if (session('message'))
    <div class="alert alert-success">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('message') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('error') }}
    </div>
@endif

<div class="col-xs-12">

  <span hidden class="id">{{ $cliente ? $cliente->id : "" }}</span>

  <div class="col-md-12 col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">
            Clientes
          </div>
          <div class="panel-body">
            <p>Los clientes son una manera f&aacute;cil de administrar tu informaci&oacute;n y no tener que introducir los datos cada vez. Mediante esta forma podr&aacute;s crear y editar a los clientes que te aparecen en el &aacute;rea de facturaci&oacute;n</p>
          </div>
          <div class="panel-footer">
              Si tienes dudas contactanos
      </div>
    </div>
  </div>  

</div>

{{ Form::open([
    'method' => $cliente ? 'PUT' : 'POST',
    'route' => $cliente ? ['clientes.update', $cliente->id] : 'clientes.store',
    'id' => 'form'
]) }}
  <div class="col-xs-12">
    <div class="form-group col-sm-6 col-xs-12">
      <label for="nombre">Raz&oacute;n social:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre o razon social']) !!}
      </div>
    </div>

    <div class="form-group col-sm-6 col-xs-12">
      <label for="rfc">RFC:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        {!! Form::text('rfc', null, ['class' => 'form-control', 'placeholder' => 'rfc']) !!}
      </div>
    </div>
  </div>

  <div class="form-group col-sm-12 col-xs-12">

    <div class="input-group col-xs-12">
      <label for="dir" class="col-xs-12">Direcci&oacute;n:</label>
      <div class="form-group col-sm-6">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
          {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Calle']) !!}
        </div>
      </div>
      <div class="form-group col-sm-3 col-xs-12">
        <div class="input-group col-xs-12">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-home"></i></span>
            {!! Form::text('exterior', null, ['class' => 'form-control', 'placeholder' => 'Num ext']) !!}
          </div>
        </div>
      </div>
      <div class="form-group col-sm-3 col-xs-12">
        <div class="input-group col-xs-12">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-building"></i></span>
            {!! Form::text('interior', null, ['class' => 'form-control', 'placeholder' => 'Num int']) !!}
          </div>
        </div>
      </div>
    </div>

    <div class="form-group col-sm-6 col-xs-12">
      <div class="input-group col-xs-12">
          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
          <input class="form-control" type="text" name="colonia" placeholder="Colonia" id="colonia" value="{{$cliente ? $direccion->colonia : ""}}">
      </div>
    </div>

    <div class="form-group col-sm-6">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
          {!! Form::text('cp', null, ['class' => 'form-control', 'placeholder' => 'CP']) !!}
        </div>
    </div>

    <div class="input-group col-xs-12">
      
      <div class="form-group col-sm-4">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-compass"></i></span>
          {!! Form::text('delegacion', null, ['class' => 'form-control', 'placeholder' => 'Delegacion']) !!}
        </div>
      </div>

      <div class="form-group col-sm-4">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-compass"></i></span>
          {!! Form::text('municipio', null, ['class' => 'form-control', 'placeholder' => 'Municipio']) !!}
        </div>
      </div>

      <div class="form-group col-sm-4">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-globe"></i></span>
          {!! Form::select('estados', $estados); !!}
        </div>
      </div>
      
    </div>

    <div class="form-group col-xs-12">
      <label for="email">Email</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'mail@example.com']) !!}
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-offset-3 col-sm-6">
    <button class="btn btn-success btn-block">{{ $cliente != null ? "Editar" : "Crear" }}</button>
  </div>
{{ Form::close() }}

@endsection

@push('scripts')
    <script src="{{ asset('js/clientes.js') }}"></script>
@endpush