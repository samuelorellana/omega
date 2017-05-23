<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Personas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id_persona');
            $table->integer('id_bitacora')->unsigned()->index();
            $table->string('codigo_institucion',6);
            $table->string('nombre',50);
            $table->string('ap_paterno',50)->nullable();
            $table->string('ap_materno',50)->nullable();
            $table->timestamp('fecha_nacimiento')->nullable();
            $table->string('documento_identidad',10)->nullable();
            $table->string('tipo_documento',4)->nullable();
            $table->string('sexo',2)->nullable();
            $table->string('email',100)->nullable();
            $table->string('no_telefono',10)->nullable();
            $table->string('no_celular',10)->nullable();
            $table->string('no_telefono_trabajo',10)->nullable();
            $table->string('direccion',100)->nullable();
            $table->string('ciudad_residencia',50)->nullable();
            $table->string('lugar_nacimiento',50)->nullable();
            $table->string('estado',2)->nullable();
            $table->timestamps();

            $table->foreign('id_bitacora')->references('id_bitacora')->on('bitacoras');
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
        Schema::drop('personas');
    }
}
