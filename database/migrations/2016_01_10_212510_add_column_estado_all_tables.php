<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnEstadoAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('estado')->default('ACTIVO');
        });
        Schema::table('usuarios', function ($table) {
            $table->string('estado')->default('ACTIVO');
        });
        Schema::table('autors', function ($table) {
            $table->string('estado')->default('ACTIVO');
        });
        Schema::table('categorias', function ($table) {
            $table->string('estado')->default('ACTIVO');
        });
        Schema::table('editorials', function ($table) {
            $table->string('estado')->default('ACTIVO');
        });
        Schema::table('libros', function ($table) {
            $table->string('estado')->default('ACTIVO');
        });
        Schema::table('ubicacions', function ($table) {
            $table->string('estado')->default('ACTIVO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('estado');
        });
        Schema::table('usuarios', function ($table) {
            $table->dropColumn('estado');
        });
        Schema::table('autors', function ($table) {
            $table->dropColumn('estado');
        });
        Schema::table('categorias', function ($table) {
            $table->dropColumn('estado');
        });
        Schema::table('editorials', function ($table) {
            $table->dropColumn('estado');
        });
        Schema::table('libros', function ($table) {
            $table->dropColumn('estado');
        });
        Schema::table('ubicacions', function ($table) {
            $table->dropColumn('estado');
        });

    }
}
