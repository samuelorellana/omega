<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Instituciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pa_instituciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_institucion',6)->unique();
            $table->string('tipo_institucion',15);
            $table->string('nombre_institucion',50);
            $table->string('descripcion',50);
            $table->string('direccion',100);
            $table->string('estado',3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pa_instituciones');
    }
}
