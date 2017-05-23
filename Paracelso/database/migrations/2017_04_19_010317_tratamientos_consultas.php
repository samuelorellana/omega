<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TratamientosConsultas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamientos_consultas', function (Blueprint $table) {
            $table->increments('id_tratamiento_consulta');
            $table->integer('id_consulta')->unsigned()->index();
            $table->integer('id_bitacora');
            $table->string('tipo_tratamiento',4);
            $table->string('prescripcion',300)->nullable();
            $table->string('codigo_medicamento',6)->nullable();
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
        Schema::drop('tratamientos_consultas');
    }
}
