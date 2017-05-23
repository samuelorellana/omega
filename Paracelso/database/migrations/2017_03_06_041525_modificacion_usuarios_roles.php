<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModificacionUsuariosRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios_roles', function (Blueprint $table) {
            //
            $table->renameColumn('id_usuario','user_id');
            $table->renameColumn('id_rol','roles_id');
            $table->dropColumn('fecha_asignacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios_roles', function (Blueprint $table) {
            //
            $table->renameColumn('user_id','id_usuario');
            $table->renameColumn('roles_id','id_rol');
            $table->timestamp('fecha_asignacion')->nullable();
        });
    }
}
