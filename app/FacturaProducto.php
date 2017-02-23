<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaProducto extends Model
{
    protected $table = 'factura_producto';
    protected $guarded = ['id'];

    public function producto(){
    	return $this->belongsTo('App\Producto', 'producto');
    }

}
