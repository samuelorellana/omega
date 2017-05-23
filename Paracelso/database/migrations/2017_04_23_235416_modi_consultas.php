<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModiConsultas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consultas', function (Blueprint $table) {
            $table->date('fecha_hora')->change();
            $table->renameColumn('fecha_hora','fecha');            
            $table->time('hora')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultas', function (Blueprint $table) {
            $table->timestamp('fecha')->change();
            $table->renameColumn('fecha','fecha_hora');            
            $table->dropColumn('hora');
        });
    }
}
