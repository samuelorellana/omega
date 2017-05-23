<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TratamientosHistoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamientos_historia', function (Blueprint $table) {
            $table->increments('id_tratamiento_historia');
            $table->integer('id_bitacora');
            $table->integer('id_historia')->unsigned()->index();
            $table->string('tratamiento',50);
            $table->string('causa_tratamiento',100)->nullable();
            $table->string('modo_tratamiento',50)->nullable();
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
        Schema::drop('tratamientos_historia');
    }
}
