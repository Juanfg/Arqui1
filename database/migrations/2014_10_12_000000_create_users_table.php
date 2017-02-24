<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->integer('timbres')->default(0);
            $table->integer('datos_facturacion')->unsigned();
            $table->foreign('datos_facturacion')->references('id')->on('datos_cli')->onDelete('restrict')->onUpdate('cascade');
            $table->string('key');
            $table->string('cer');
            $table->string('password_cer');
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
        Schema::dropIfExists('users');
    }
}
