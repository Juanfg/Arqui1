<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use App\DatosCli;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Validator::extend('tarjetaDeCredito', function($attribute, $value, $parameters, $validator) {
            $digits = str_split($value);
            $len = count($digits);

            if ($len < 13)
                return false;

            $value = 0;
            for ($i = 0; $i < $len; $i+=2)
            {
                $digits[$i] = $digits[$i] * 2;
                if ($digits[$i] > 9)
                    $digits[$i] = ($digits[$i]%10) + 1;
            }
            for ($i = 0; $i < $len; $i++)
                $value += $digits[$i];
            return $value%10 == 0;
        });

        Validator::extend('rfc', function($attribute, $value, $parameters, $validator) {
            $regex = '/^[A-Z]{3,4}([0-9]{2})(1[0-2]|0[1-9])([0-3][0-9])([ -]?)([A-Z0-9]{3,4})$/';
	        return preg_match($regex, $value);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
