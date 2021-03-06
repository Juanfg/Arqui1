<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'timbres'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function folios()
    {
        return $this->belongsToMany('App\User', 'pago', 'cli_sistema', 'folio_id');
    }

    function datos_facturacion(){
        return $this->belongsTo('App\DatosCli', 'datos_facturacion')->first();
    }
}
