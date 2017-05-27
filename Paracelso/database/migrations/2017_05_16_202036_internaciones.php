<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Internaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internaciones', function (Blueprint $table) {
            $table->increments('id_internacion');
            $table->integer('id_orden_internacion')->nullable();
            //por el momento... hasta que la orden de internacion se genere en la misma institucion en la que se ejecutara la internacion
            $table->integer('id_bitacora');
            $table->integer('id_persona')->unsigned()->index();
            $table->integer('id_medico')->unsigned()->index();
            $table->string('codigo_institucion',6);
            $table->string('tipo_internacion',4);
            $table->timestamp('fecha_hora');
            $table->string('estado',2);

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
        Schema::drop('internaciones');
    }
}
