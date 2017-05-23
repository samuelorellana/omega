<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModificacionDatosAfiliacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('datos_afiliacion', function (Blueprint $table) {
            $table->integer('id_empleador')->unsigned()->index();

            $table->foreign('id_empleador')->references('id_empleador')->on('datos_empleador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('datos_afiliacion', function (Blueprint $table) {
            $table->dropColumn('id_empleador');
        });
    }
}
