<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModificacionCitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citas', function (Blueprint $table) {
            //
            $table->renameColumn('personas_id','id_persona');
            $table->renameColumn('medicos_id','id_medico');
            $table->renameColumn('consultorios_id','id_consultorio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('citas', function (Blueprint $table) {
            //
            $table->renameColumn('id_persona','personas_id');
            $table->renameColumn('id_medico','medicos_id');
            $table->renameColumn('id_consultorio','consultorios_id');
        });
    }
}
