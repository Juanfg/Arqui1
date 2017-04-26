<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'factura';
    protected $guarded = ['id'];

    public function cliente(){
    	return $this->belongsTo('App\Cliente', 'cliente')->first();
    }

    public function facturador(){
        return $this->belongsTo('App\DatosCli', 'datos_cli')->first();
    }

    public function productos(){
        return $this->belongsToMany('App\Producto', 'factura_producto' , 'factura', 'producto')
            ->withPivot('cantidad', 'descuento');
    }

    public function monto(){
    	$productos = $this->productos()->get();
        $suma = 0;


        foreach ($productos as $producto) {
           $suma += ($producto->pivot->cantidad * $producto->precio) * (100 - $producto->pivot->descuento) / 100;
        }
        return $suma;
    }

}
