<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

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
            $value = 0;
            for ($i = 0; $i < $len; $i+=2)
            {
                $digits[$i] = $digits[$i] * 2;
                if ($digits[$i] > 9)
                    $digits[$i] = ($digits[$i]%10) + 1;
            }
            for ($i = 0; $i < $len; $i++)
                $value += $digits[$i];
            var_dump($value);
            return true;
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
