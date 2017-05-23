<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PersonasImagenes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_imagenes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_persona')->unsigned()->index();
            $table->binary('imagen')->nullable();
            $table->string('estado',2);

            $table->foreign('id_persona')->references('id_persona')->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personas_imagenes');
    }
}
