<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosCli extends Model
{
    protected $table = 'datos_cli';
    protected $guarded = ['id'];

    public function direccion(){
    	return $this->belongsTo('App\Direccion', 'direccion')->first();
    }
}
