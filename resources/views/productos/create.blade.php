@extends('layouts.blank')

@section('content')

<div class="col-xs-12">

  <div class="col-md-12 col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">
            Productos
          </div>
          <div class="panel-body">
            <p>Mediante esta forma podr&aacute;s crear y editar a los productos.</p>
          </div>
          <div class="panel-footer">
              Si tienes dudas contactanos
      </div>
    </div>
  </div>  

</div>

<div class="col-xs-12">
  <div class="form-group col-sm-6 col-xs-12">
    <label for="nombre">Nombre:</label>
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-plus-circle"></i></span>
      <input class="form-control" type="text" name="nombre" placeholder="Nombre del producto" id="razon" value="{{$producto ? $producto->nombre : ""}}">
    </div>
  </div>

  <div class="form-group col-sm-6 col-xs-12">
    <label for="rfc">Unidad:</label>
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-adjust"></i></span>
      <input class="form-control" type="text" name="unidad" id="unidad" placeholder="Unidad" value="{{$producto ? $producto->unidad : ""}}">
    </div>
  </div>
</div>

<div class="form-group col-sm-12 col-xs-12">

  <div class="input-group col-xs-12">
    <label for="dir" class="col-xs-12">Precio:</label>
    <div class="form-group col-sm-6">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-money"></i></span>
        <input class="form-control" type="number" name="precio" placeholder="$0.00" id="precio" value="{{$producto ? $producto->precio : ""}}">
      </div>
    </div>

  <div class="input-group col-xs-12">
    <label for="dir" class="col-xs-12">IVA: <input type="checkbox" name="iva" id="iva" {{ $producto && $producto->iva ? "checked" : "" }}/></label>
    </div>

<div class="input-group col-xs-12">
    <label for="dir" class="col-xs-12">IEPS: <input type="checkbox" {{ $producto && $producto->ieps ? "checked" : "" }}/></label>
    </div>
</div>


<div class="col-xs-12 col-sm-offset-3 col-sm-6">
  <button class="btn btn-success btn-block">{{ $producto != null ? "Editar" : "Crear" }}</button>
</div>
@endsection