@extends('layouts.blank')

@section('content')

<div class="col-xs-12">

  <div class="col-md-12 col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Factura emitida
      </div>
     
      <div class="panel-footer">
        Si tienes dudas contactanos
      </div>
    </div>
  </div>  
</div>

<div class="col-xs-12">
  <div class="alert alert-danger" id="errors" hidden="true">
  </div>
  <h1>Datos del cliente</h1>
  </div>
  <div id="datos-cliente">
    <div class="col-xs-12">
      <div class="form-group col-sm-6 col-xs-12">
        <label for="nombre">Raz&oacute;n social:</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input class="form-control" type="text" name="nombre" placeholder="Nombre o raz&oacute;n social" id="razon" disabled value="{{$cliente->razon_social}}">
        </div>
      </div>

      <div class="form-group col-sm-6 col-xs-12">
        <label for="rfc">RFC:</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input class="form-control" type="text" name="rfc" id="rfc" placeholder="LOXR990101ABC" value="{{$cliente->rfc}}" disabled>
        </div>
      </div>
    </div>

    <div class="form-group col-sm-12 col-xs-12">

      <div class="input-group col-xs-12">
        <label for="dir" class="col-xs-12">Direcci&oacute;n:</label>
        <div class="form-group col-sm-6">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
            <input class="form-control" type="text" name="direccion" placeholder="Calle" id="calle" value="{{$direccion_cliente->calle}}" disabled>
          </div>
        </div>
        <div class="form-group col-sm-3 col-xs-12">
          <div class="input-group col-xs-12">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-home"></i></span>
              <input class="form-control" type="text" name="exterior" placeholder="Num ext" id="next" value="{{$direccion_cliente->num_ext}}" disabled>
            </div>
          </div>
        </div>
        <div class="form-group col-sm-3 col-xs-12">
          <div class="input-group col-xs-12">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-building"></i></span>
              <input class="form-control" type="text" name="interior" placeholder="Num int" id="nint" disabled value="{{$direccion_cliente->num_int}}">
            </div>
          </div>
        </div>
      </div>

      <div class="form-group col-sm-6 col-xs-12">
        <div class="input-group col-xs-12">
          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
          <input class="form-control" type="text" name="colonia" placeholder="Colonia" id="colonia" disabled value="{{$direccion_cliente->colonia}}">
        </div>
      </div>

      <div class="form-group col-sm-6">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
          <input class="form-control" type="text" name="cp" placeholder="CP" id="cp" disabled
          value="{{$direccion_cliente->cp}}">
        </div>
      </div>

      <div class="input-group col-xs-12">

        <div class="form-group col-sm-4">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-compass"></i></span>
            <input class="form-control" type="text" name="delegacion" placeholder="Delegacion" id="delegacion" disabled value="{{$direccion_cliente->delegacion}}">
          </div>
        </div>

        <div class="form-group col-sm-4">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-compass"></i></span>
            <input class="form-control" type="text" name="municipio" placeholder="Municipio" id="municipio" disabled value="{{$direccion_cliente->municipio}}">
          </div>
        </div>

        <div class="form-group col-sm-4">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
            <input class="form-control" type="text" name="estado" placeholder="Estado" id="estado" disabled value="{{$direccion_cliente->estado()->first()->nombre}}">
          </div>
        </div>
      </div>

      <div class="form-group col-xs-12">
        <label for="email">Email</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
          <input class="form-control" type="text" name="email" placeholder="mail@example.com" id="email" disabled value="{{$cliente->email}}">
        </div>
      </div>
    </div>
  </div>

  <h1> Datos del facturador </h1>
  <div id="datos-cliente">
    <div class="col-xs-12">
      <div class="form-group col-sm-6 col-xs-12">
        <label for="nombre">Raz&oacute;n social:</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input class="form-control" type="text" name="nombre" placeholder="Nombre o raz&oacute;n social" id="razon" disabled value="{{$cliente->razon_social}}">
        </div>
      </div>

      <div class="form-group col-sm-6 col-xs-12">
        <label for="rfc">RFC:</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input class="form-control" type="text" name="rfc" id="rfc" placeholder="LOXR990101ABC" value="{{$cliente->rfc}}" disabled>
        </div>
      </div>
    </div>

    <div class="form-group col-sm-12 col-xs-12">

      <div class="input-group col-xs-12">
        <label for="dir" class="col-xs-12">Direcci&oacute;n:</label>
        <div class="form-group col-sm-6">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
            <input class="form-control" type="text" name="direccion" placeholder="Calle" id="calle" value="{{$direccion_cliente->calle}}" disabled>
          </div>
        </div>
        <div class="form-group col-sm-3 col-xs-12">
          <div class="input-group col-xs-12">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-home"></i></span>
              <input class="form-control" type="text" name="exterior" placeholder="Num ext" id="next" value="{{$direccion_cliente->num_ext}}" disabled>
            </div>
          </div>
        </div>
        <div class="form-group col-sm-3 col-xs-12">
          <div class="input-group col-xs-12">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-building"></i></span>
              <input class="form-control" type="text" name="interior" placeholder="Num int" id="nint" disabled value="{{$direccion_cliente->num_int}}">
            </div>
          </div>
        </div>
      </div>

      <div class="form-group col-sm-6 col-xs-12">
        <div class="input-group col-xs-12">
          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
          <input class="form-control" type="text" name="colonia" placeholder="Colonia" id="colonia" disabled value="{{$direccion_cliente->colonia}}">
        </div>
      </div>

      <div class="form-group col-sm-6">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
          <input class="form-control" type="text" name="cp" placeholder="CP" id="cp" disabled
          value="{{$direccion_cliente->cp}}">
        </div>
      </div>

      <div class="input-group col-xs-12">

        <div class="form-group col-sm-4">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-compass"></i></span>
            <input class="form-control" type="text" name="delegacion" placeholder="Delegacion" id="delegacion" disabled value="{{$direccion_cliente->delegacion}}">
          </div>
        </div>

        <div class="form-group col-sm-4">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-compass"></i></span>
            <input class="form-control" type="text" name="municipio" placeholder="Municipio" id="municipio" disabled value="{{$direccion_cliente->municipio}}">
          </div>
        </div>

        <div class="form-group col-sm-4">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
            <input class="form-control" type="text" name="estado" placeholder="Estado" id="estado" disabled value="{{$direccion_cliente->estado()->first()->nombre}}">
          </div>
        </div>
      </div>

      <div class="form-group col-xs-12">
        <label for="email">Email</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
          <input class="form-control" type="text" name="email" placeholder="mail@example.com" id="email" disabled value="{{$cliente->email}}">
        </div>
      </div>
    </div>
  </div>
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Unidad</th>
          <th>Precio</th>
          <th class="hidden-xs">IVA</th>
          <th class="hidden-xs">IEPS</th>
          <th>Cantidad</th>
          <th>Descuento</th>
          <th>Acciones</th>
        </tr>
      </thead>

      <tbody>
        <tr class="base" hidden>
          <td>
            <div class="form-group">
              <select name="producto[]" class="ignored form-control">
                <option value="-1">Elige un producto</option>

                @foreach ($productos as $producto)
                <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                @endforeach
              </select>
            </div>
          </td>
          <td class="unidad updatable"></td>
          <td class="precio updatable"></td>
          <td class="iva hidden-xs updatable"></td>
          <td class="ieps hidden-xs updatable"></td>
          <td><input name="cantidad[]" class="cantidad ignored" type="number" placeholder="Introduce la cantidad"></td>
          <td><input name="descuento[]" class="descuento ignored" type="number" placeholder="Introduce el descuento o 0.0" value="0.0"></td>
          <td>
            <button class="btn btn-danger btn-xs rm_product"><i class="fa fa-trash"></i></button>
          </td>        
        </tr>
      </tbody>
    </table>

    <div class="col-xs-12 col-sm-offset-3 col-sm-6">
      <button class="btn btn-success btn-block" id="done" role="button" href="facturas">Volver</button>
    </div>
  @endsection

  @push('scripts')
  @endpush