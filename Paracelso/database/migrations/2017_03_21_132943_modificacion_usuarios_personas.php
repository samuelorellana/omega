<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModificacionUsuariosPersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios_personas', function (Blueprint $table) {
            //
            $table->renameColumn('id_usuario','user_id');
            $table->renameColumn('id_persona','personas_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios_personas', function (Blueprint $table) {
            //
            $table->renameColumn('user_id','id_usuario');
            $table->renameColumn('personas_id','id_persona');
        });
    }
}
