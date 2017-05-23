<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AntecedentesHistoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_historia', function (Blueprint $table) {
            $table->increments('id_antecedente_historia');
            $table->integer('id_bitacora');
            $table->integer('id_historia')->unsigned()->index();
            $table->string('tipo_antecedente',4);
            $table->string('descripcion',100)->nullable();
            $table->string('estado',2);
            //$table->timestamps();
            $table->foreign('id_historia')->references('id_historia')->on('historias_clinicas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('antecedentes_historia');
    }
}
