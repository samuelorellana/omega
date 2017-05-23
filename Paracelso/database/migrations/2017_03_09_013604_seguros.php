<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Seguros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pa_seguros', function (Blueprint $table) {
            $table->increments('id_seguro');
            $table->string('tipo_seguro',20);
            $table->string('nombre',50);
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
        Schema::drop('pa_seguros');
    }
}
