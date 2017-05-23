<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnamnesisHistoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anamnesis_historia', function (Blueprint $table) {
            $table->increments('id_anamnesis_historia');
            $table->integer('id_bitacora');
            $table->integer('id_historia')->unsigned()->index();
            $table->string('tipo',4);
            $table->string('descripcion',200);
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
        Schema::drop('anamnesis_historia');
    }
}
