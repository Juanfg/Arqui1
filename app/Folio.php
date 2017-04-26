<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folio extends Model
{
    protected $table = 'folios';
    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'pago', 'folio_id', 'cli_sistema');
    }
}
