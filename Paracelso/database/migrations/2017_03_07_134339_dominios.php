<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dominios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pa_dominios', function (Blueprint $table) {
            $table->increments('id_dominio');
            $table->string('nombre',200);
            $table->string('codigo_dominio',6);
            $table->string('descripcion',200);
            $table->string('estado',2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pa_dominios');
    }
}
