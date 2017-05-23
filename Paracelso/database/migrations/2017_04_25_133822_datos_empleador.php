<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatosEmpleador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_empleador', function (Blueprint $table) {
            $table->increments('id_empleador');
            $table->string('tipo_institucion',50);
            $table->string('nombre_institucion',100);
            $table->string('descripcion',100);
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
        Schema::drop('datos_empleador');
    }
}
