@extends('layouts.blank')

@section('content')

<div class="col-xs-12">

  <div class="col-md-12 col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">
              Registro
          </div>
          <div class="panel-body">
            <p>Bienvenido. Estas a punto de formar parte de nuestro selecto grupo de clientes<br>Todos nuestros clientes tienen algo en com&uacute;n: Desean hacer sus facturas de manera facil y r&aacute;pida.<br>Porfavor llena este forato de registro y muy pronto podr&aacute;s facturar en linea con nosotros.</p>
          </div>
          <div class="panel-footer">
              Si tienes dudas contactanos
      </div>
    </div>
  </div>  

</div>

<form role="form" method="POST" action="{{ route('register') }}">
{{ csrf_field() }}
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
      {!! Form::text('rfc', null, ['class' => 'form-control', 'placeholder' => 'LOXR990101ABC']) !!}      
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
        {!! Form::text('colonia', null, ['class' => 'form-control', 'placeholder' => 'Colonia']) !!}   
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
          {!! Form::select('estados', $estados, null, ['class' => 'form-control']); !!}
      </div>
    </div>
    
  </div>

  <div class="form-group col-xs-12 col-sm-6">
    <label for="email">Email</label>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'mail@example.com']) !!}   
    </div>
  </div>
  <div class="form-group col-sm-6">
    <label for="email">Contrase&ntilde;a</label>
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-key"></i></span>
      {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'La que usaras para entrar al sistema']) !!}   
    </div>
  </div>

  <div class="form-group col-xs-12 col-sm-6">
    <label for="exampleInputFile">Llave del SAT</label>
    <input type="file" id="exampleInputFile" />
    <p class="help-block">La llave que te dio el SAT para autenticarte.</p>
  </div>
  <div class="form-group col-xs-12 col-sm-6">
    <label for="exampleInputFile">Certificado del SAT</label>
    <input type="file" id="exampleInputFile" />
    <p class="help-block">El certificado que acompa&ntilde;a la llave</p>
  </div>
  <div class="form-group col-sm-12">
    <label for="email">Contrase&ntilde;a de la llave</label>
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-key"></i></span>
      {!! Form::password('password-factura', ['class' => 'form-control', 'placeholder' => 'Sin este dato no podremos facturar para ti']) !!}   
    </div>
  </div>

</div>
<div class="col-xs-12 col-sm-offset-3 col-sm-6">
  <button class="btn btn-success btn-block">Registrar</button>
</div>

</form>
@endsection