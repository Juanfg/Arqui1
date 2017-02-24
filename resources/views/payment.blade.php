@extends('layouts.blank')

@section('content')

<div class="col-xs-12">

  <div class="col-xs-12">
    <div class="panel panel-default">
      <div class="panel-heading">
              Compra de folios
          </div>
          <div class="panel-body">
            <p>Para facturar en nuestro sistema necesitaras comprar folios. Un folio te permite realizar una factura.<br>Toma en cuenta que entre m&aacute;s folios compres m&aacute;s baratos ser&aacute;n tus folios</p>  
          </div>
          <div class="panel-footer">
              Si tienes dudas contactanos
      </div>
    </div>
  </div>
  <div class="col-xs-12">
      <div class="panel panel-info">
          <div class="panel-heading">
             Tus folios
          </div>
          <div class="panel-body">
              <p>Te informamos que tienes <b>10</b> folios</p>
          </div>
          <div class="panel-footer">
              Toma en cuenta que usas un folio cada que emites una factura.<br> No recuperas los folios de facturas canceladas
          </div>
      </div>
  </div>

</div>

<div class="fcol-xs-12 col-lg-6">
  <label for="nombre">Nombre:</label>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input class="form-control" type="text" name="nombre" placeholder="Nombre o raz&oacute;n social" id="razon">
  </div>
</div>
<div class="form-group col-sm-6 col-xs-12 col-lg-4">
    <label for="rfc">Numero de tarjeta:</label>
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
      <input class="form-control" type="text" name="rfc" id="rfc" placeholder="XXXX XXXX XXXX XXXX">
    </div>
</div>
<div class="input-group col-sm-6 col-lg-2 col-xs-12">
  <label for="dir" class="col-xs-12">C&oacute;digo de seguridad:</label>
  <div class="form-group col-xs-12">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-key"></i></span>
      <input class="form-control" type="password" name="direccion" placeholder="XXX" id="calle">
    </div>
  </div>
</div>

<!-- Inicia productos -->
 <div class="row">
  <div class="col-sm-6 col-md-3 col-xs-12">
    <div class="dashboard-div-wrapper bk-clr-four">
      <i  class="fa fa-ticket dashboard-div-icon" ></i>
      <div class="progress progress-striped complete"></div>     
      <h5>5 Folios</h5>          
      <h5>$100 </h5>          
    </div>
  </div>  
  <div class="col-sm-6 col-md-3 col-xs-12">
    <div class="dashboard-div-wrapper bk-clr-one">
      <i  class="fa fa-ticket dashboard-div-icon" ></i>
      <div class="progress progress-striped complete"></div>     
      <h5>10 Folios </h5>          
      <h5>$180 </h5>          
    </div>
  </div>
  <div class="col-sm-6 col-md-3 col-xs-12">
    <div class="dashboard-div-wrapper bk-clr-two">
      <i  class="fa fa-ticket dashboard-div-icon" ></i>
      <div class="progress progress-striped complete"></div>     
      <h5>100 Folios </h5>          
      <h5>$1500 </h5>          
    </div>
  </div>  
  <div class="col-sm-6 col-md-3 col-xs-12">
    <div class="dashboard-div-wrapper bk-clr-three">
      <i  class="fa fa-ticket dashboard-div-icon" ></i>
      <div class="progress progress-striped complete"></div>     
      <h5>500 Folios </h5>          
      <h5>$6000 </h5>          
    </div>
  </div>  
</div>
<!-- Termina productos -->

    

</div>
<div class="col-xs-12 col-sm-offset-3 col-sm-6">
  <p><b>Nuestro sistema no almacena ning&uacute;n tipo de informaci&oacute;n de tu tarjeta</b></p>
</div>
<div class="col-xs-12 col-sm-offset-3 col-sm-6">
  <button class="btn btn-success btn-block">Comprar</button>
</div>
@endsection