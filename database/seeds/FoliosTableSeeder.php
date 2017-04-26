<?php

use Illuminate\Database\Seeder;

class FoliosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('folios')->insert([
            'cantidad' => 5,
            'precio'   => 100
        ]);
        
        DB::table('folios')->insert([
            'cantidad' => 10,
            'precio'   => 180
        ]);

        DB::table('folios')->insert([
            'cantidad' => 100,
            'precio'   => 1500
        ]);

        DB::table('folios')->insert([
            'cantidad' => 500,
            'precio'   => 6000
        ]);
    }
}
