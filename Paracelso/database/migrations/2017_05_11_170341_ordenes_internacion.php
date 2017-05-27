<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdenesInternacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_internacion', function (Blueprint $table) {
            $table->increments('id_orden_internacion');
            $table->integer('id_bitacora');
            $table->string('codigo_institucion',6);
            $table->integer('id_consulta')->unsigned()->index();
            $table->integer('id_persona')->unsigned()->index();
            $table->integer('id_medico')->unsigned()->index();
            $table->string('tipo_internacion',4);
            $table->string('lugar_internacion',100);
            $table->date('fecha_internacion');
            $table->string('estado',2);
            $table->timestamps();

            $table->foreign('codigo_institucion')->references('codigo_institucion')->on('pa_instituciones');
            $table->foreign('id_consulta')->references('id_consulta')->on('consultas');
            $table->foreign('id_persona')->references('id_persona')->on('personas');
            $table->foreign('id_medico')->references('id_medico')->on('medicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ordenes_internacion');
    }
}
