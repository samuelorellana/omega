<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HistoriasClinicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('historias_clinicas', function (Blueprint $table) {
            $table->increments('id_historia');
            $table->integer('id_bitacora');
            $table->integer('id_persona')->unsigned()->index();
            $table->integer('id_medico')->unsigned()->index();
            $table->string('codigo_institucion',6);
            $table->string('nota',500)->nullable();
            $table->string('grupo_sanguineo',8)->nullable();
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
        //
        Schema::drop('historias_clinicas');
    }
}
