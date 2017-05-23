<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alergias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alergias', function (Blueprint $table) {
            $table->increments('id_alergia');
            $table->integer('id_historia')->unsigned()->index();
            $table->integer('id_bitacora');
            $table->string('tipo_alergia',4);
            $table->string('severidad',20)->nullable();
            $table->string('agente',20)->nullable();
            $table->string('estado',2);

            //$table->timestamps();
            $table->foreign('id_historia')->references('id_historia')->on('historias_clinicas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('alergias');
    }
}
