<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('documento')->unique();
            $table->string('direccion');
            $table->string('email')->unique();
	        $table->string('perfil');
	        $table->rememberToken();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('usuarios');
    }
}
