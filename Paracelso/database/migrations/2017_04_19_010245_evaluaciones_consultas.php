<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EvaluacionesConsultas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones_consultas', function (Blueprint $table) {
            $table->increments('id_evaluacion_consulta');
            $table->integer('id_consulta')->unsigned()->index();
            $table->integer('id_bitacora');
            $table->string('laboratorio',300)->nullable();
            $table->string('gabinete',300)->nullable();
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
        Schema::drop('evaluaciones_consultas');
    }
}
