<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Citas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id_cita');
            $table->integer('id_bitacora');
            $table->integer('personas_id')->unsigned()->index();
            $table->integer('medicos_id')->unsigned()->index();
            $table->integer('consultorios_id')->nullable();
            $table->string('codigo_institucion',6);
            $table->string('motivo',50);
            $table->string('historia',200)->nullable();
            $table->timestamp('fecha');
            $table->timestamp('hora');
            $table->string('estado',2);
            $table->timestamps();

            $table->foreign('personas_id')->references('id_persona')->on('personas');
            $table->foreign('medicos_id')->references('id_medico')->on('medicos');
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
        Schema::drop('citas');
    }
}
