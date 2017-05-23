<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transacciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pa_transacciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_transaccion',10)->unique();
            $table->string('descripcion',100);
            $table->string('abreviacion',2);
            $table->string('estado',2);
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
        Schema::drop('pa_transacciones');
    }
}
