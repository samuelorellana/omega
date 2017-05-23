<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Medicamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pa_medicamentos', function (Blueprint $table) {
            $table->increments('id_medicamento');
            $table->string('codigo_medicamento',6);
            $table->string('nombre_comercial',50);
            $table->string('nombre_medico',50);
            $table->string('codigo_marca',4);
            $table->string('presentacion',50);
            $table->string('estado',2);
            $table->string('tipo_medicamento',6);
            $table->string('posologia',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('pa_medicamentos');
    }
}
