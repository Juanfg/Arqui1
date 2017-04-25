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
        <input class="form-control" type="text" name="nombre" placeholder="Nombre o raz&oacute;n social" id="razon" value="{{$cliente ? $cliente->razon_social : ""}}">
      </div>
    </div>

    <div class="form-group col-sm-6 col-xs-12">
      <label for="rfc">RFC:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input class="form-control" type="text" name="rfc" id="rfc" placeholder="LOXR990101ABC" value="{{$cliente ? $cliente->rfc : ""}}">
      </div>
    </div>
  </div>

  <div class="form-group col-sm-12 col-xs-12">

    <div class="input-group col-xs-12">
      <label for="dir" class="col-xs-12">Direcci&oacute;n:</label>
      <div class="form-group col-sm-6">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
          <input class="form-control" type="text" name="direccion" placeholder="Calle" id="calle" value="{{$cliente ? $direccion->calle : ""}}">
        </div>
      </div>
      <div class="form-group col-sm-3 col-xs-12">
        <div class="input-group col-xs-12">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-home"></i></span>
            <input class="form-control" type="text" name="exterior" placeholder="Num ext" id="next" value="{{$cliente ? $direccion->num_ext : ""}}">
          </div>
        </div>
      </div>
      <div class="form-group col-sm-3 col-xs-12">
        <div class="input-group col-xs-12">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-building"></i></span>
            <input class="form-control" type="text" name="interior" placeholder="Num int" id="nint" value="{{$cliente && $direccion->num_int ? $direccion->num_int : ""}}">
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
          <input class="form-control" type="text" name="cp" placeholder="CP" id="cp" value="{{$cliente ? $direccion->cp : ""}}">
        </div>
    </div>

    <div class="input-group col-xs-12">
      
      <div class="form-group col-sm-4">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-compass"></i></span>
          <input class="form-control" type="text" name="delegacion" placeholder="Delegacion" id="delegacion" value="{{$cliente ? $direccion->delegacion : ""}}">
        </div>
      </div>

      <div class="form-group col-sm-4">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-compass"></i></span>
          <input class="form-control" type="text" name="municipio" placeholder="Municipio" id="municipio" value="{{$cliente ? $direccion->municipio : ""}}">
        </div>
      </div>

      <div class="form-group col-sm-4">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-globe"></i></span>
          <select name="estados" class="form-control" id="estado">
            @foreach ($estados as $estado)
              <option value="{{$estado->id}}" {{ $cliente && $estado->id == $direccion->estado ? "selected" : "" }}>{{$estado->nombre}}</option>
            @endforeach
          </select>
        </div>
      </div>
      
    </div>

    <div class="form-group col-xs-12">
      <label for="email">Email</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input class="form-control" type="text" name="email" placeholder="mail@example.com" id="email" value="{{$cliente ? $cliente->email : ""}}">
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