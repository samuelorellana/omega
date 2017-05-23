<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RevisionesConsultas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisiones_consultas', function (Blueprint $table) {
            $table->increments('id_revision_consulta');
            $table->integer('id_consulta')->unsigned()->index();
            $table->integer('id_bitacora');
            $table->string('revision_general',255);
            $table->string('cabeza_cuello',150)->nullable();
            $table->string('torax',150)->nullable();
            $table->string('miembros_superiores',150)->nullable();
            $table->string('abdomen',150)->nullable();
            $table->string('genital_urinario',150)->nullable();
            $table->string('miembros_inferiores',150)->nullable();
            $table->string('neurologico',150)->nullable();
            $table->string('otros',150)->nullable();
            $table->string('estado',2);

            $table->foreign('id_consulta')->references('id_consulta')->on('consultas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('revisiones_consultas');
    }
}
