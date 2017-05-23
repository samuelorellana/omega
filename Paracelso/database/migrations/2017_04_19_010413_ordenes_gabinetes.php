<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdenesGabinetes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_gabinetes', function (Blueprint $table) {
            $table->increments('id_orden_gabinete');
            $table->integer('id_consulta')->unsigned()->index();
            $table->integer('id_bitacora');
            $table->string('tipo_gabinete',4);
            $table->string('orden',300)->nullable();
            $table->string('complemento',150)->nullable();
            $table->string('urgente',2)->nullable();
            $table->timestamp('fecha_hora');
            $table->string('estado',2);

            $table->foreign('id_consulta')->references('id_consulta')->on('consultas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ordenes_gabinetes');
    }
}
