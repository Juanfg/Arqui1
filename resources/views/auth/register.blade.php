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

<div class="col-xs-12">
  <div class="form-group col-sm-6 col-xs-12">
    <label for="nombre">Raz&oacute;n social:</label>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input class="form-control" type="text" name="nombre" placeholder="Nombre o raz&oacute;n social" id="razon">
    </div>
  </div>

  <div class="form-group col-sm-6 col-xs-12">
    <label for="rfc">RFC:</label>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input class="form-control" type="text" name="rfc" id="rfc" placeholder="LOXR990101ABC">
    </div>
  </div>
</div>

<div class="form-group col-sm-12 col-xs-12">

  <div class="input-group col-xs-12">
    <label for="dir" class="col-xs-12">Direcci&oacute;n:</label>
    <div class="form-group col-sm-6">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
        <input class="form-control" type="text" name="direccion" placeholder="Calle" id="calle">
      </div>
    </div>
    <div class="form-group col-sm-3 col-xs-12">
      <div class="input-group col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-home"></i></span>
          <input class="form-control" type="text" name="exterior" placeholder="Num ext" id="next">
        </div>
      </div>
    </div>
    <div class="form-group col-sm-3 col-xs-12">
      <div class="input-group col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-building"></i></span>
          <input class="form-control" type="text" name="interior" placeholder="Num int" id="nint">
        </div>
      </div>
    </div>
  </div>

  <div class="form-group col-sm-6 col-xs-12">
    <div class="input-group col-xs-12">
        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
        <input class="form-control" type="text" name="colonia" placeholder="Colonia" id="colonia">
    </div>
  </div>

  <div class="form-group col-sm-6">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
        <input class="form-control" type="text" name="cp" placeholder="CP" id="cp">
      </div>
  </div>

  <div class="input-group col-xs-12">
    
    <div class="form-group col-sm-4">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-compass"></i></span>
        <input class="form-control" type="text" name="delegacion" placeholder="Delegacion" id="delegacion">
      </div>
    </div>

    <div class="form-group col-sm-4">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-compass"></i></span>
        <input class="form-control" type="text" name="municipio" placeholder="Municipio" id="municipio">
      </div>
    </div>

    <div class="form-group col-sm-4">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-globe"></i></span>
        <select name="estados" class="form-control" id="estado">
          <option value="1">Aguascalientes</option>
          <option value="2">Baja California</option>
          <option value="3">Baja California Sur</option>
          <option value="4">Campeche</option>
          <option value="5">Coahuila</option>
          <option value="6">Colima</option>
          <option value="7">Chiapas</option>
          <option value="8">Chihuahua</option>
          <option value="9">Distrito Federal</option>
          <option value="10">Durango</option>
          <option value="11">Guanajuato</option>
          <option value="12">Guerrero</option>
          <option value="13">Hidalgo</option>
          <option value="14">Jalisco</option>
          <option value="15">México</option>
          <option value="16">Michoacán</option>
          <option value="17">Morelos</option>
          <option value="18">Nayarit</option>
          <option value="19">Nuevo León</option>
          <option value="20">Oaxaca</option>
          <option value="21">Puebla</option>
          <option value="22">Querétaro</option>
          <option value="23">Quintana Roo</option>
          <option value="24">San Luis Potosí</option>
          <option value="25">Sinaloa</option>
          <option value="26">Sonora</option>
          <option value="27">Tabasco</option>
          <option value="28">Tamaulipas</option>
          <option value="29">Tlaxcala</option>
          <option value="30">Veracruz</option>
          <option value="31">Yucatán</option>
          <option value="32">Zacatecas</option>
        </select>
      </div>
    </div>
    
  </div>

  <div class="form-group col-xs-12 col-sm-6">
    <label for="email">Email</label>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      <input class="form-control" type="text" name="email" placeholder="mail@example.com" id="email">
    </div>
  </div>
  <div class="form-group col-sm-6">
    <label for="email">Contrase&ntilde;a</label>
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-key"></i></span>
      <input class="form-control" type="password" name="password" placeholder="La que usaras para entrar al sistema" id="email">
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
      <input class="form-control" type="password" name="password" placeholder="Sin este dato no podremos facturar para ti" id="email">
    </div>
  </div>

</div>
<div class="col-xs-12 col-sm-offset-3 col-sm-6">
  <button class="btn btn-success btn-block">Registrar</button>
</div>
@endsection