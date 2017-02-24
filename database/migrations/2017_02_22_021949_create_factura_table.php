<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('duenio')->unsigned();
            $table->foreign('duenio')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->string('folio');
            $table->string('certificado');
            $table->timestamp('fecha_certificacion')->nullable();
            $table->timestamp('fecha_creacion')->nullable();
            $table->string('sello_cfdi');
            $table->string('sello_sat');
            $table->string('complemento_sat');
            $table->integer('datos_cli')->unsigned();
            $table->foreign('datos_cli')->references('id')->on('datos_cli')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('cliente')->unsigned();
            $table->foreign('cliente')->references('id')->on('cliente')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
            $table->boolean('cancelada')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura');
    }
}
