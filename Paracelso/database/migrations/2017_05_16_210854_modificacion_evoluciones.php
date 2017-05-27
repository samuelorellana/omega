<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModificacionEvoluciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evoluciones', function (Blueprint $table) {
            //
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
        Schema::table('evoluciones', function (Blueprint $table) {
            //
            $table->dropcolumn('estado');
        });
    }
}
