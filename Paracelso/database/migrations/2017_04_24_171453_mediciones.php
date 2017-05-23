<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mediciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mediciones', function (Blueprint $table) {
            $table->increments('id_medicion');
            $table->integer('id_persona')->unsigned()->index();
            $table->integer('id_bitacora');
            $table->smallInteger('glasgow')->nullable();
            $table->smallInteger('frecuencia_cardiaca')->nullable();
            $table->smallInteger('frecuencia_respiratoria')->nullable();
            $table->smallInteger('presion_sistolica')->nullable();
            $table->smallInteger('presion_diastolica')->nullable();
            $table->double('peso',3,2)->nullable();
            $table->smallInteger('talla')->nullable();
            $table->double('temperatura',2,1);
            $table->smallInteger('spo2')->nullable();
            $table->smallInteger('dolor')->nullable();
            $table->string('notas',100)->nullable();
            $table->string('estado',2);
            $table->timestamps();

            $table->foreign('id_persona')->references('id_persona')->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mediciones');
    }
}
