<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Evoluciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evoluciones', function (Blueprint $table) {
            $table->increments('id_evolucion');
            $table->integer('id_internacion')->unsigned()->index();
            $table->integer('id_bitacora');
            $table->integer('id_medico')->unsigned()->index();
            $table->string('tipo_evolucion',4);
            $table->string('subjetivo',500);
            $table->string('objetivo',500)->nullable();
            $table->smallInteger('glasgow')->nullable();
            $table->smallInteger('frecuencia_cardiaca')->nullable();
            $table->smallInteger('frecuencia_respiratoria')->nullable();
            $table->smallInteger('presion_sistolica')->nullable();
            $table->smallInteger('presion_diastolica')->nullable();
            $table->double('peso',3,2)->nullable();
            $table->smallInteger('talla')->nullable();
            $table->double('temperatura',2,1)->nullable();
            $table->string('plan',500);
            $table->string('tipo_conducta',4);
            $table->timestamp('fecha_hora');

            $table->foreign('id_internacion')->references('id_internacion')->on('internaciones');
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
        Schema::drop('evoluciones');
    }
}
