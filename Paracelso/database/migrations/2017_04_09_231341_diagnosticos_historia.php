<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiagnosticosHistoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosticos_historia', function (Blueprint $table) {
            $table->increments('id_diagnostico_historia');
            $table->integer('id_bitacora');
            $table->integer('id_historia')->unsigned()->index();
            $table->string('diagnostico',100);
            $table->string('agudo_cronico',2);
            $table->string('comentarios',100)->nullable();
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
        Schema::drop('diagnosticos_historia');
    }
}
