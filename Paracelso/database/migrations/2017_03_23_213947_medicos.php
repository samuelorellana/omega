<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Medicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->increments('id_medico');
            $table->integer('id_bitacora');
            $table->integer('personas_id')->unsigned()->index();
            $table->string('codigo_institucion',6);
            $table->string('codigo_especialidad',4);
            $table->string('matricula_min_salud',10)->nullable();
            $table->string('matricula_col_medico',10)->nullable();
            $table->integer('ranking')->nullable();
            $table->string('alma_mater',100)->nullable();
            $table->string('estado',2);
            $table->timestamps();

            $table->foreign('personas_id')->references('id_persona')->on('personas');
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
        Schema::drop('medicos');
    }
}
