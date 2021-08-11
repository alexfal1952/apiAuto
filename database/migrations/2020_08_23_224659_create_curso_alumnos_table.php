<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_alumnos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('alumno_id')->unsigned();
            $table->foreign('alumno_id')->references('id')->on('alumnos');

            $table->bigInteger('periodo_id')->unsigned();
            $table->foreign('periodo_id')->references('id')->on('periodos');

            $table->bigInteger('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id')->on('cursos');

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
        Schema::dropIfExists('curso_alumnos');
    }
}
