<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModificacionEvaluaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evaluaciones_consultas', function (Blueprint $table) {
            $table->string('tipo_conducta',4)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evaluaciones_consultas', function (Blueprint $table) {
            $table->dropColumn('tipo_conducta');
        });
    }
}
