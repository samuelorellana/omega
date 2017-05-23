<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaRelacionUserInstitucion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('codigo_institucion',6);

            //codigo para crear una llave foranea... referenciando a instituciones...
            $table->foreign('codigo_institucion')->references('codigo_institucion')->on('pa_instituciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropForeign('users_codigo_institucion_foreign');
            $table->dropColumn('codigo_institucion');
        });
    }
}
