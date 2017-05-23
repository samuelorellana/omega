<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatosAfiliacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_afiliacion', function (Blueprint $table) {
            $table->increments('id_dato_afiliacion');
            $table->integer('id_persona')->unsigned()->index();
            $table->string('codigo_institucion',6);
            $table->string('codigo_seguro',20)->nullable();
            $table->string('matricula_seguro',20)->nullable();
            $table->string('historia_familiar',20)->nullable();
            $table->string('observaciones',200)->nullable();
            $table->timestamps();

            $table->foreign('id_persona')->references('id_persona')->on('personas');
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
        Schema::drop('datos_afiliacion');
    }
}
