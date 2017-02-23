<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosCliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_cli', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razon_social');
            $table->string('rfc');
            $table->integer('direccion')->unsigned();
            $table->foreign('direccion')->references('id')->on('direccion')->onDelete('restrict')->onUpdate('cascade');
            $table->string('email');
            $table->boolean('visible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_cli');
    }
}
