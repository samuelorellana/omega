<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModificacionOpcionesRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opciones_roles', function (Blueprint $table) {
            //
            $table->renameColumn('id_opcion','opciones_id');
            $table->renameColumn('id_rol','roles_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('opciones_roles', function (Blueprint $table) {
            //
            $table->renameColumn('opciones_id','id_opcion');
            $table->renameColumn('roles_id','id_rol');
        });
    }
}
