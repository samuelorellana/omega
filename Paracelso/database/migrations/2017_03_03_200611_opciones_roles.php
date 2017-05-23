<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OpcionesRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opciones_roles', function (Blueprint $table) {
            $table->increments('id_opcion_rol');
            $table->integer('id_opcion')->unsigned()->index();
            $table->integer('id_rol')->unsigned()->index();
            $table->timestamps();

            $table->foreign('id_opcion')->references('id_opcion')->on('opciones')->onDelete('cascade');
            $table->foreign('id_rol')->references('id_rol')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('opciones_roles');
    }
}
