<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('titulo')->unique();
	        $table->date('fecha_registro');
	        $table->string('isbn')->unique();
	        $table->string('pais_impreso');
	        $table->integer('anho_edicion');
	        $table->string('idioma');
	        $table->integer('num_paginas');
	        $table->integer('ejemplares');

			$table->integer('categoria_id')->unsigned();
	        $table->integer('autor_id')->unsigned();
	        $table->integer('editorial_id')->unsigned();
	        $table->integer('ubicacion_id')->unsigned();

	        $table->foreign('categoria_id')->references('id')->on('categorias');
	        $table->foreign('autor_id')->references('id')->on('autors');
	        $table->foreign('editorial_id')->references('id')->on('editorials');
	        $table->foreign('ubicacion_id')->references('id')->on('ubicacions');

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
        Schema::drop('libros');
    }
}
