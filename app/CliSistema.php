<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CliSistema extends Model
{
    protected $table = 'users';
    protected $guarded = ['id'];

    public function datos(){
    	return $this->belongsTo('App\DatosCli', 'datos_facturacion')->first();
    }

    public function facturas(){
    	return $this->hasMany('App\Factura', 'duenio')->get();
    }

    public function productos(){
        return $this->hasMany('App\Producto', 'duenio')->get();
    }

    public function pagos(){
    	return $this->hasMany('App\Pago', 'cli_sistema')->get();
    }
}
