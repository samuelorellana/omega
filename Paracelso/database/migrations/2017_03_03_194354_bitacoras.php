<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bitacoras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->increments('id_bitacora');
            $table->string('codigo_transaccion',10);
            $table->string('codigo_institucion',6);
            $table->integer('id_usuario')->unsigned();
            $table->string('estado',2);
            $table->timestamps();

            $table->foreign('codigo_transaccion')->references('codigo_transaccion')->on('pa_transacciones')->onDelete('cascade');
            $table->foreign('codigo_institucion')->references('codigo_institucion')->on('pa_instituciones')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bitacoras');
    }
}
