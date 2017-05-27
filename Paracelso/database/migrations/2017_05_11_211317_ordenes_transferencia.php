<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdenesTransferencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_transferencia', function (Blueprint $table) {
            $table->increments('id_orden_transferencia');
            $table->integer('id_bitacora');
            $table->string('codigo_institucion',6);
            $table->string('origen',2);
            $table->integer('id_origen')->unsigned()->index();
            $table->integer('id_persona')->unsigned()->index();
            $table->integer('id_medico')->unsigned()->index();
            $table->string('tipo_transferencia',4);
            $table->string('motivo_transferencia',350);
            $table->string('institucion',100);
            $table->string('diagnosticos',500);
            $table->string('notas',500);
            $table->string('estado',2);
            $table->timestamps();

            $table->foreign('codigo_institucion')->references('codigo_institucion')->on('pa_instituciones');
            $table->foreign('id_persona')->references('id_persona')->on('personas');
            $table->foreign('id_medico')->references('id_medico')->on('medicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ordenes_transferencia');
    }
}
