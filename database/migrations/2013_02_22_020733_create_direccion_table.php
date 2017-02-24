<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('calle');
            $table->integer('num_ext');
            $table->integer('num_int')->nullable();
            $table->string('colonia');
            $table->integer('cp');
            $table->string('delegacion');
            $table->string('municipio');
            $table->integer('estado')->unsigned();
            $table->foreign('estado')->references('id')->on('estado')->onDelete('restrict')->onUpdate('cascade');
            $table->boolean('visible')->default(1);
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
        Schema::dropIfExists('direccion');
    }
}
