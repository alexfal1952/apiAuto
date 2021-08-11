<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rut')->unique();
            $table->string('digito');
            $table->string('sexo');
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->string('direccion');
            $table->string('email')->nullable();
            $table->string('fono')->nullable();
            $table->date('fechaNacimiento');
            $table->boolean('estado');
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
        Schema::dropIfExists('alumnos');
    }
}