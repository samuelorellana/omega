<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Consultas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id_consulta');
            $table->integer('id_bitacora');
            $table->integer('id_persona')->unsigned()->index();
            $table->integer('id_consultorio')->nullable();
            $table->integer('id_medico')->unsigned()->index();
            $table->integer('id_receptor')->nullable();
            $table->integer('id_cita')->nullable();
            $table->string('codigo_institucion',6);
            $table->string('tipo_consulta',4);
            $table->string('motivo_consulta',250);
            $table->string('historia',250)->nullable();
            $table->timestamp('fecha_hora');
            $table->string('estado',2);
            $table->timestamps();

            $table->foreign('id_persona')->references('id_persona')->on('personas');
            $table->foreign('id_medico')->references('id_medico')->on('medicos');
            $table->foreign('codigo_institucion')->references('codigo_institucion')->on('pa_instituciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('consultas');
    }
}
