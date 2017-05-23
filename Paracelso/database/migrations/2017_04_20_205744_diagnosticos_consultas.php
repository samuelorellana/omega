<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiagnosticosConsultas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosticos_consultas', function (Blueprint $table) {
            $table->increments('id_diagnostico_consulta');
            $table->integer('id_evaluacion_consulta')->unsigned()->index();
            $table->integer('id_bitacora');
            $table->string('tipo_diagnostico',4);
            $table->string('codigo_cie',10)->nullable();
            $table->string('descripcion',300);
            $table->string('estado',2);

            $table->foreign('id_evaluacion_consulta')->references('id_evaluacion_consulta')->on('evaluaciones_consultas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('diagnosticos_consultas');
    }
}
