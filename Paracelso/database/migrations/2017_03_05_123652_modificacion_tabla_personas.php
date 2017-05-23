<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModificacionTablaPersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personas', function (Blueprint $table) {
            //
            $table->string('codigo_seguro',20)->nullable();
            $table->string('matricula_seguro',20)->nullable();
            $table->string('religion',20)->nullable();
            $table->string('observaciones',200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personas', function (Blueprint $table) {
            //
            $table->dropColumn('codigo_seguro');
            $table->dropColumn('matricula_seguro');
            $table->dropColumn('religion');
            $table->dropColumn('observaciones');
        });
    }
}
