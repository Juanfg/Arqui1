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

@isset($producto)
  {!! Form::model($producto, ['route' => ['productos.update', $producto->id], 'method' => 'PUT'] ) !!}
@else
  {!! Form::open( ['route' => 'productos.store', 'method' => 'POST']) !!}
@endif
  <div class="col-xs-12">
    <div class="form-group col-sm-6 col-xs-12">
      <label for="nombre">Nombre:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-plus-circle"></i></span>
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del producto']) !!}
      </div>
    </div>

    <div class="form-group col-sm-6 col-xs-12">
      <label for="rfc">Unidad:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-adjust"></i></span>
        {!! Form::text('unidad', null, ['class' => 'form-control', 'placeholder' => 'Unidad']) !!}
      </div>
    </div>
  </div>

  <div class="form-group col-sm-12 col-xs-12">

    <div class="input-group col-xs-12">
      <label for="dir" class="col-xs-12">Precio:</label>
      <div class="form-group col-sm-6">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-money"></i></span>
          {!! Form::number('precio', null, ['class' => 'form-control', 'placeholder' => '$0.00']) !!}
        </div>
      </div>

      <div class="input-group col-xs-12">
        <label for="dir" class="col-xs-12">IVA: 
          {!! Form::checkbox('iva', 1) !!}
        </label>
      </div>

      <div class="input-group col-xs-12">
        <label for="dir" class="col-xs-12">IEPS: 
           {!! Form::checkbox('ieps', 1) !!}
        </label>
      </div>
    </div>


    <div class="col-xs-12 col-sm-offset-3 col-sm-6">
      <button class="btn btn-success btn-block" type="submit" id="done">{{ isset($producto) ? "Editar" : "Crear" }}</button>
    </div>

  {!! Form::close() !!}
  @endsection

  @push('scripts')
  <script src="{{ asset('js/productos.js') }}"></script>
  @endpush