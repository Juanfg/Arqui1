<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'factura';
    protected $guarded = ['id'];

    public function cliente(){
    	$this->belongsTo('App\Cliente', 'cliente')->first();
    }

    public function productos(){
    	$this->belongsTo('App\Producto', 'factura')->first();
    }

}
