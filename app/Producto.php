<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $guarded = ['id'];

    function facturas(){
    	return $this->belongsToMany('App\Factura', 'factura_producto', 'producto', 'factura');
    }

}
