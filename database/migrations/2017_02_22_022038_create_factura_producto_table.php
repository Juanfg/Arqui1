<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('factura')->unsigned();
            $table->foreign('factura')->references('id')->on('factura')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('producto')->unsigned();
            $table->foreign('producto')->references('id')->on('producto')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('cantidad');
            $table->integer('descuento');
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
        Schema::dropIfExists('factura_producto');
    }
}
