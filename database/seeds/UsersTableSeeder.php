<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('estado')->insert([
            'id' => '1',
            'nombre' => 'Puebla',
        ]);

    	DB::table('direccion')->insert([
            'calle' => '10 sur',
            'num_ext' => '2908',
            'colonia' => str_random(15),
            'cp' => rand(10000, 99999),
            'delegacion' => str_random(20),
            'municipio' => str_random(20),
            'estado' => 1,
        ]);

        DB::table('datos_cli')->insert([
            'razon_social' => 'Ricardo Lopez',
            'rfc' => 'LOFR950207HM2',
            'direccion' => 1,
            'email' => str_random(10).'@gmail.com',
        ]);

    	DB::table('users')->insert([
            'id' => 1,
            'email' => 'rikyfocil@gmail.com',
            'password' => bcrypt('secret'),
            'datos_facturacion' => 1,
            'key' => str_random(20),
            'cer' => str_random(20),
            'password_cer' => str_random(20),
        ]);
    }
}


