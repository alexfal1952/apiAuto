<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesorCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesor_cursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('estado');
            $table->bigInteger('profe_id')->unsigned();
            $table->foreign('profe_id')->references('id')->on('users');
            $table->bigInteger('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id')->on('cursos');
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
        Schema::dropIfExists('profesor_cursos');
    }
}
