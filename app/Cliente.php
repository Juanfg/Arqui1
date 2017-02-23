<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $guarded = ['id'];

    public function direccion(){
    	return $this->belongsTo('App\Direccion', 'direccion')->first();
    }
}
