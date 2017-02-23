<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direccion';
    protected $guarded = ['id'];

    public function estado(){
        return $this->belongsTo('App\Estado', 'estado');
    }
    
}
