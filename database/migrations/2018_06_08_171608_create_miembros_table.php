<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miembros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('identificacion');
            $table->integer('n_identificacion');
            $table->string('genero');
            $table->string('estado_civil');
            $table->string('cabeza_hogar');
            $table->date('nacimiento');
            $table->string('lugar_nacimiento');
            $table->string('ministerio');
            $table->string('profesion');
            $table->string('estado');
            $table->text('habilidades');
            $table->string('direccion');
            $table->string('barrio');
            $table->string('departamento');
            $table->string('ciudad');
            $table->string('celular');
            $table->string('telefono');
            $table->string('email');
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
        Schema::dropIfExists('miembros');
    }
}
