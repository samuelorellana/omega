<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SitioInternaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitio_internaciones', function (Blueprint $table) {
            $table->increments('id_sitio_internacion');
            $table->integer('id_internacion')->unsigned()->index();
            $table->integer('id_bitacora');
            $table->integer('id_medico')->unsigned()->index();
            $table->string('tipo_unidad',4);
            $table->string('piso',4);
            $table->string('cama',4);
            $table->string('notas',150)->nullable();
            $table->timestamp('fecha_hora');
            $table->string('estado',2);

            $table->foreign('id_medico')->references('id_medico')->on('medicos');
            $table->foreign('id_internacion')->references('id_internacion')->on('internaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sitio_internaciones');
    }
}
