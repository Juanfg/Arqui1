@extends('layouts.blank')

@section('content')

<div class="col-xs-12">

  <div class="col-md-12 col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">
            Facturar
          </div>
          <div class="panel-body">
            <p>Para facturar elige un cliente, y posteriormente agrega todos los productos que necesites. Si debes de cambiar la informaci&oacute;n del cliente o de los productos, deber&aacute;s hacerlo en la secci&oacute;n correspondiente y luego volver a esta p&aacute;gina<br>Si no tienes folios disponibles deber&aacute;s comprarlos antes de poder facturar</p>
          </div>
          <div class="panel-footer">
              Si tienes dudas contactanos
      </div>
    </div>
  </div>  
</div>

<div class="col-xs-12">
  <div class="form-group col-xs-12">
    <label for="nombre">Elige al cliente:</label>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <select class="form-control">
        <option value="-1">Elige por favor</option>
        @foreach ($clientes as $cliente)
            <option value="{{$cliente->id}}">{{$cliente->razon_social}}</option>
        @endforeach      </select>
    </div>
</div>
</div>
<div class="col-xs-12">
  <div class="form-group col-sm-6 col-xs-12">
    <label for="nombre">Raz&oacute;n social:</label>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input class="form-control" type="text" name="nombre" placeholder="Nombre o raz&oacute;n social" id="razon" disabled>
    </div>
  </div>

  <div class="form-group col-sm-6 col-xs-12">
    <label for="rfc">RFC:</label>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input class="form-control" type="text" name="rfc" id="rfc" placeholder="LOXR990101ABC" disabled>
    </div>
  </div>
</div>

<div class="form-group col-sm-12 col-xs-12">

  <div class="input-group col-xs-12">
    <label for="dir" class="col-xs-12">Direcci&oacute;n:</label>
    <div class="form-group col-sm-6">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
        <input class="form-control" type="text" name="direccion" placeholder="Calle" id="calle" disabled>
      </div>
    </div>
    <div class="form-group col-sm-3 col-xs-12">
      <div class="input-group col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-home"></i></span>
          <input class="form-control" type="text" name="exterior" placeholder="Num ext" id="next" disabled>
        </div>
      </div>
    </div>
    <div class="form-group col-sm-3 col-xs-12">
      <div class="input-group col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-building"></i></span>
          <input class="form-control" type="text" name="interior" placeholder="Num int" id="nint" disabled>
        </div>
      </div>
    </div>
  </div>

  <div class="form-group col-sm-6 col-xs-12">
    <div class="input-group col-xs-12">
        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
        <input class="form-control" type="text" name="colonia" placeholder="Colonia" id="colonia" disabled>
    </div>
  </div>

  <div class="form-group col-sm-6">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
        <input class="form-control" type="text" name="cp" placeholder="CP" id="cp" disabled>
      </div>
  </div>

  <div class="input-group col-xs-12">
    
    <div class="form-group col-sm-4">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-compass"></i></span>
        <input class="form-control" type="text" name="delegacion" placeholder="Delegacion" id="delegacion" disabled>
      </div>
    </div>

    <div class="form-group col-sm-4">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-compass"></i></span>
        <input class="form-control" type="text" name="municipio" placeholder="Municipio" id="municipio" disabled>
      </div>
    </div>

    <div class="form-group col-sm-4">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-globe"></i></span>
        <input class="form-control" type="text" name="estado" placeholder="Estado" id="estado" disabled>
      </div>
    </div>
  </div>

  <div class="form-group col-xs-12">
    <label for="email">Email</label>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      <input class="form-control" type="text" name="email" placeholder="mail@example.com" id="email" disabled>
    </div>
  </div>
</div>


<div class="col-xs-12 col-sm-offset-4 col-sm-4 form-group">
  <button class="btn btn-success btn-block" id="add">Agregar producto</button>
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
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        <tr class="base" hidden>
            <td>
                <select>
                <option value="-1">Elige un producto</option>

                @foreach ($productos as $producto)
                <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                @endforeach
                </select>   
            </td>
            <td class="unidad"></td>
            <td class="precio"></td>
            <td class="iva hidden-xs"></td>
            <td class="ieps hidden-xs"></td>
            <td class=""><input class="cantidad" type="number" placeholder="Introduce la cantidad"></td>
            <td>
                <button class="btn btn-danger btn-xs rm_product"><i class="fa fa-trash"></i></button>
            </td>        
        </tr>
    </tbody>
</table>

<div class="col-xs-12 col-sm-offset-3 col-sm-6">
  <button class="btn btn-success btn-block" id="done">Facturar</button>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('js/facturas.js') }}"></script>
@endpush