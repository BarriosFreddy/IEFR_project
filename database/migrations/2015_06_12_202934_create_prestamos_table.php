<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id');
	        $table->date('fecha_entrega');
	        $table->date('fecha_devolucion_max');
	        $table->date('fecha_devolucion');
	        $table->string('comentario');
	        $table->boolean('estado');
	        $table->integer('user_id')->unsigned();
	        $table->integer('usuario_id')->unsigned();
	        $table->integer('libro_id')->unsigned();

	        $table->foreign('user_id')->references('id')->on('users');
	        $table->foreign('usuario_id')->references('id')->on('usuarios');
	        $table->foreign('libro_id')->references('id')->on('libros');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('prestamos');
    }
}
